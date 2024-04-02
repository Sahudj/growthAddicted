<?php
namespace App\Http\Controllers;
use IlluminateHttpRequest;
use Validator;
use App\Models\Orders;
use App\Models\Affiliate;
use App\Models\States;
use App\Models\User;
use App\Models\Packages;
use Illuminate\Http\Request;
use DateTime;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth; 
use DB;
use Mail;
use PDF;
use Storage;
use Log;
use PHPMailer\PHPMailer\PHPMailer;  
use PHPMailer\PHPMailer\Exception;
use Illuminate\Contracts\Session\Session;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;
class UserController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService) {
        //test
        // $this->APP_ID = "198789cd2991db8a7d2825fcef987891";
        // $this->SECRET_KEY = "05d9ef9d3d1274b598c6ef25d46710eae7f54a36";

        $this->APP_ID = "24721884d002b8bdf6527cb857812742";
        $this->SECRET_KEY = "6926985d2bcefd18aa21686230b2dce729329d5f";
        
           //SANDBOX
        $this->APP_ID = "198789cd2991db8a7d2825fcef987891";
        $this->SECRET_KEY = "05d9ef9d3d1274b598c6ef25d46710eae7f54a36";
        $this->CASH_FREE_URL = "https://sandbox.cashfree.com";

        if(env('CASH_FREE_MODE') == 'PRODUCTION'){
            $this->APP_ID = "247218cebeaa22705a48b4532c812742";
            $this->SECRET_KEY = "d5569182cf021436e7d7c256130604290771ee6b";
            $this->CASH_FREE_URL = "https://api.cashfree.com";
        }


        $this->userService = $userService;
        $this->minimumAmount = 10;
        $this->maximumAmount = 5000;
    }

    function signup (){

        $packages = Packages::where('status', 1)->get();   
        $states = States::all();
        $lastPackageId = Packages::where('status', 1)->orderBy('id', 'desc')->first()->id;
        return View('register', compact('packages', 'states', 'lastPackageId'));
    }


  function order(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile_no'=> ['required', 'numeric', 'min:10'],
            'password' => ['required', 'string', 'min:8'],
            'state' => ['required'],
            'package' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $refUserId = $request->_token_data;
        
        if(isset($refUserId) && !empty($refUserId)){
            $refUserId = $this->encryptor('decrypt', $refUserId);
        }

        $packageAmount = DB::table('packages')->select('name','amount', 'affiliate_price')->where('id', $request->package)->first();
        $customerName = $request->name;
        $customerPhone = $request->mobile_no;
        $customerEmail = $request->email;
        $password = $request->password;
        $referralPerson = !empty($request->referralPerson) ? $this->encryptor('decrypt', $request->referralPerson) : 0 ;
        $amount = ($referralPerson == 0) ? $packageAmount->amount : $packageAmount->affiliate_price;
        // $amount = 1;

        $now = new DateTime();
        $ctime = $now->format('Y-m-d H:i:s');
        $input = $request->all();
        $input['ctime'] = $ctime;
        $input['amount'] = $amount;
        $input['ref_by'] = $refUserId;
        $input['login_action'] = !empty($request->loginAction) ? 1 : 0 ;
        $userId = $this->userService->createUser($input);
        $input['user_id'] = $userId;
        $orderId = $this->userService->createOrder($input);
        $input['orderId'] = $orderId;
        $request->session()->put('order_id', $orderId);
        $secretKey =  $this->SECRET_KEY;

        if(isset($request->loginAction) && !empty($request->loginAction)){
            $txStatus = "PAYMENT_SUCCESS";
            Auth::loginUsingId($userId);
            return redirect('user/thankyou/'.$this->encryptor('encrypt', $orderId).'/?status='.$txStatus.'&msg=1')->with('message', 'Thank you for purchase this package !');
        }
        $postData = array(
            "appId" => $this->APP_ID,
            "orderId" => $orderId,
            "orderAmount" => $amount,
            "orderCurrency" => 'INR',
            "orderNote" => 'Wallet',
            "customerName" => $customerName,
            "customerPhone" => $customerPhone,
            "customerEmail" => $customerEmail,
            'customerId' =>$userId,
            "password" => $password,
            // "returnUrl" => url('return-url'),
            // "returnUrl" => url('return-url/?order_id='.$orderId), // 30-01-2023
            "returnUrl" => url('return-url/?order_id={order_id}'), // 03-09-2023
            "notifyUrl" => url('notify_url'),
            'secretKey' => $secretKey,
        );

        $orderResponse = $this->createOrderId($postData);
        
        return view('cashfree_confirmation')->with($orderResponse);
    }

    // create order id 
    function createOrderId($postData=''){
              
        try {
            $client = new Client();

            $url = $this->CASH_FREE_URL.'/pg/orders';


            $headers = [
                'Content-Type' => 'application/json',
                'x-api-version' => '2022-09-01',
                'x-client-id' => $this->APP_ID,
                'x-client-secret' => $this->SECRET_KEY,
            ];

            $data = [
                'order_id' => strval($postData['orderId']),
                'order_amount' => $postData['orderAmount'],
                'order_currency' => 'INR',
                'order_note' => $postData['orderNote'],
                'customer_details' => [
                    'customer_id' =>strval($postData['customerId']),
                    'customer_name' => $postData['customerName'],
                    'customer_email' => $postData['customerEmail'],
                    'customer_phone' => $postData['customerPhone'],
                ],
                'order_meta'=>[
                'return_url' =>$postData['returnUrl'],
                'notify_url' =>$postData['notifyUrl']
                ]
                
            ];

            $response = $client->post($url, [
                'headers' => $headers,
                'json' => $data,
            ]);

            // Get the status code
            $statusCode = $response->getStatusCode();

            // Check if the status code is 200 (OK)
            if ($statusCode === 200) {
                $responseData = $response->getBody()->getContents();
                
                // Now you can work with $responseData, which contains the response from the server.
                
                // To get the "payments" URL from the response JSON:
                return $responseDataArray = json_decode($responseData, true);
               
            } else {
                // Handle non-200 status codes as needed
                echo "Non-200 Status Code: $statusCode";
                die;
            }
            } catch (RequestException $e) {
                // Handle request-related exceptions, e.g., network issues, invalid URLs, etc.
                // $e->getMessage() will contain the error message.
                // You can log the error or take appropriate action here.
                echo 'RequestException: ' . $e->getMessage();
                die;
            } catch (\Exception $e) {
                // Handle other exceptions that might occur.
                // You can log the error or take appropriate action here.
                echo 'Exception: ' . $e->getMessage();
                die;
            }


    }

    // function order (Request $request){
       
    //     $validator = Validator::make($request->all(), [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'mobile_no'=> ['required', 'numeric', 'min:10'],
    //         'password' => ['required', 'string', 'min:8'],
    //         'state' => ['required'],
    //         'package' => ['required'],
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }
    //     $refUserId = $request->_token_data;
        
    //     if(isset($refUserId) && !empty($refUserId)){
    //         $refUserId = $this->encryptor('decrypt', $refUserId);
    //     }
    //     $packageAmount = DB::table('packages')->select('name','amount')->where('id', $request->package)->first();
    //     $customerName = $request->name;
    //     $customerPhone = $request->mobile_no;
    //     $customerEmail = $request->email;
    //     $password = $request->password;
    //     $amount = $packageAmount->amount;

    //     $now = new DateTime();
    //     $ctime = $now->format('Y-m-d H:i:s');
    //     $input = $request->all();
    //     $input['ctime'] = $ctime;
    //     $input['amount'] = $amount;
    //     $input['ref_by'] = $refUserId;
    //     $userId = $this->userService->createUser($input);
    //     $input['user_id'] = $userId;
    //     $orderId = $this->userService->createOrder($input);
    //     $request->session()->put('order_id', $orderId);
    //     $secretKey =  $this->SECRET_KEY;
    //     $input['orderId'] = $orderId;

    //     $setting = DB::table('setting')->where('meta_key', 'payment_mode')->first();
    //     $paymentSetting = DB::table('paymentSetting')->where('packageId', $request->package)->first();

    //     if($paymentSetting->paymentMode == 1){
    //         $result = $this->userService->phonepay($input);
    //         $redirectUrl = $result->data->instrumentResponse->redirectInfo->url;
    //         return redirect()->away($redirectUrl);
    //     }

    //     // if($setting->meta_value == 'phonepay') {
    //         // $result = $this->userService->phonepay($input);
    //         // $redirectUrl = $result->data->instrumentResponse->redirectInfo->url;
    //         // return redirect()->away($redirectUrl);
    //     // }

    //     // if($setting->meta_value == 'phonepay' && ($request->package != 3)){
    //     //     $result = $this->userService->phonepay($input);
    //     //     $redirectUrl = $result->data->instrumentResponse->redirectInfo->url;
    //     //     return redirect()->away($redirectUrl);
    //     // }

    //     if($paymentSetting->paymentMode == 2){
    //         $postData = array(
    //             "appId" => $this->APP_ID,
    //             "orderId" => $orderId,
    //             "orderAmount" => $amount,
    //             "orderCurrency" => 'INR',
    //             "orderNote" => 'Wallet',
    //             "customerName" => $customerName,
    //             "customerPhone" => $customerPhone,
    //             "customerEmail" => $customerEmail,
    //             "password" => $password,
    //             // "returnUrl" => url('return-url'),
    //             "returnUrl" => url('return-url/?order_id='.$orderId), // 30-01-2023
    //             "notifyUrl" => url('notify_url'),
    //             'secretKey' => $secretKey,
    //         );

    //         return view('cashfree_confirmation')->with($postData);
    //     }
    // }


        // PhonePay 
    public function returnUrlPhonePay(Request $request){
        $orderId = $request->transactionId;
        $orderAmount = ($request->amount/100);
        $referenceId = $request->providerReferenceId;
        $txStatus = $request->code;
    
        $getUserId =  Orders::select('user_id')->where('id', $orderId)->first();
        Auth::loginUsingId($getUserId->user_id);

        if ($txStatus == 'PAYMENT_SUCCESS'){
           return redirect('user/thankyou/'.$this->encryptor('encrypt', $orderId).'/?status='.$txStatus)->with('message', 'Thank you for purchase this package !');
        }else if($txStatus == 'CANCELLED'){
             return redirect('user/thankyou/'.$this->encryptor('encrypt', $orderId).'/?status='.$txStatus)->with('message', 'Thank you for purchase this package !');
        }else{
            Orders::where('id', $orderId)->update(['status_id' => 2]);
            return redirect('user/thankyou/'.$this->encryptor('encrypt', $orderId).'/?status='.$txStatus)->with('message', 'Thank you for purchase this package !');
        }
    }

        public function callbackUrlPphonePay(Request $request){
           
            $result = base64_decode($request->response);
            $response = json_decode($result);
          
            $orderId = $response->data->merchantTransactionId; 
            $paymentStatus = $response->data->responseCode; 
            $referenceId = $response->data->transactionId;
            $paymentMode = $response->data->paymentInstrument->type;

            $getUserId =  Orders::select('user_id')->where('id', $orderId)->first();
            Auth::loginUsingId($getUserId->user_id);

            if($paymentStatus == 'SUCCESS'){
                Orders::where('id', $orderId)->update(['status_id' => 1, 'referenceId' => $referenceId, 'paymentMode' => $paymentMode]);
                    $this->userService->createAffiliate($orderId);
                    $this->userService->sendWelcomMail($orderId);
            }

        }
    //End PhonePay


    public function notify_url(Request $request){

        $orderId = $request['data']['order']['order_id']; 
        $paymentStatus = $request['data']['payment']['payment_status']; 
        $referenceId = $request['data']['payment']['cf_payment_id'];
        $paymentMode = $request['data']['payment']['payment_group'];
        $getUserId =  Orders::select('user_id')->where('id', $orderId)->first();
        Auth::loginUsingId($getUserId->user_id);

        if($paymentStatus == 'SUCCESS'){
            Orders::where('id', $orderId)->update(['status_id' => 1, 'referenceId' => $referenceId, 'paymentMode' => $paymentMode]);
                $this->userService->createAffiliate($orderId);
                $this->userService->sendWelcomMail($orderId);
        }

        $input =  json_encode($request->all());

        $insert = DB::table('webhookOrder')->insert(['webookData' => $input]);
    }
    
    
    function return_url_instamozo(Request $request){
       
        $orderId =  $request->session()->get('order_id');
        
        $input = $request->all();
    
        $ch = curl_init();
    
        curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payments/'.$request->get('payment_id'));
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
           array("X-Api-Key:51a85c8e75286777cb772d49a57617a1",
                          "X-Auth-Token:c35ad7efa671a211a4503045b788cc48"));
    
        $err = curl_error($ch);
        $response = curl_exec($ch);
        curl_close($ch); 

        if ($err) {
           return redirect('user/thankyou/'.$this->encryptor('encrypt', $orderId).'/?status='.$txStatus)->with('message', 'Thank you for purchase this package !');
        } else {
            $data = json_decode($response);
        }

        if($data->success == true) {
            $txStatus = "SUCCESS";
            if($data->payment->status == 'Credit') {
              
                $getUserId =  Orders::select('user_id')->where('id', $orderId)->first();
                Auth::loginUsingId($getUserId->user_id);
                // Orders::where('id', $orderId)->update(['status_id' => 1, 'referenceId' => $data->payment->payment_id, 'paymentMode' => $data->payment->instrument_type]);
            
                // $this->userService->createAffiliate($orderId);
                // $this->userService->sendWelcomMail($orderId);
                 return redirect('user/thankyou/'.$this->encryptor('encrypt', $orderId).'/?status='.$txStatus)->with('message', 'Thank you for purchase this package !');
    
            } else {
                $txStatus = "FAIL";
                return redirect('user/thankyou/'.$this->encryptor('encrypt', $orderId).'/?status='.$txStatus)->with('message', 'Thank you for purchase this package !');
            }
        }
    
    }

    // function return_url (Request $request){
       
    //     $orderId = $request->orderId;
       
    //     $orderAmount = $request->orderAmount;
    //     $referenceId = $request->referenceId;
    //     $txStatus = $request->txStatus;
    //     $paymentMode = $request->paymentMode;
    //     $txMsg = $request->txMsg;
    //     $txTime = $request->txTime;
    //     $signature = $request->signature;
    //     $secretkey = $this->SECRET_KEY;
    //     $data = $orderId . $orderAmount . $referenceId . $txStatus . $paymentMode . $txMsg . $txTime;
    //     $hash_hmac = hash_hmac('sha256', $data, $secretkey, true);
    //     $computedSignature = base64_encode($hash_hmac);
    //     if ($signature == $computedSignature) {
    //         $getUserId =  Orders::select('user_id')->where('id', $orderId)->first();
    //         Auth::loginUsingId($getUserId->user_id);

    //         if ($txStatus == 'SUCCESS'){
    //            return redirect('user/thankyou/'.$this->encryptor('encrypt', $orderId).'/?status='.$txStatus)->with('message', 'Thank you for purchase this package !');
    //         }else if($txStatus == 'CANCELLED'){
    //              return redirect('user/thankyou/'.$this->encryptor('encrypt', $orderId).'/?status='.$txStatus)->with('message', 'Thank you for purchase this package !');
    //             // return redirect('user/dashboard')->with('message', $txMsg);
    //         }
    //         else{
    //             Orders::where('id', $orderId)->update(['status_id' => 2]);
    //             return redirect('user/thankyou/'.$this->encryptor('encrypt', $orderId).'/?status='.$txStatus)->with('message', 'Thank you for purchase this package !');

    //            // return redirect('user/dashboard')->with('message', $txMsg);
    //         }
    //     }else{
    //         $msg = "Fail";
    //         return redirect('user/thankyou/'.$this->encryptor('encrypt', $orderId).'/?status='.$msg)->with('message', 'Thank you for purchase this package !');
    //         //return redirect('user/dashboard')->with('message', 'Signature not match');
    //     }
    // }

  function return_url (Request $request){
       
       $orderId = $request->order_id;
       $orderResponse   = $this->verifyOrder($orderId);
        $txStatus = isset($orderResponse['order_status']) ? $orderResponse['order_status']:'';
        if (!empty($txStatus)) {
            $getUserId =  Orders::select('user_id')->where('id', $orderId)->first();
            Auth::loginUsingId($getUserId->user_id);
            if ($txStatus == 'PAID'){
                $txStatus = 'PAYMENT_SUCCESS'; 
               return redirect('user/thankyou/'.$this->encryptor('encrypt', $orderId).'/?status='.$txStatus)->with('message', 'Thank you for purchase this package !');
            }
            else{
                Orders::where('id', $orderId)->update(['status_id' => 2]);
                return redirect('user/thankyou/'.$this->encryptor('encrypt', $orderId).'/?status='.$txStatus)->with('message', 'Thank you for purchase this package !');

               // return redirect('user/dashboard')->with('message', $txMsg);
            }
        }else{
            $msg = "Fail";
            return redirect('user/thankyou/'.$this->encryptor('encrypt', $orderId).'/?status='.$msg)->with('message', 'Thank you for purchase this package !');
            //return redirect('user/dashboard')->with('message', 'Signature not match');
        }
    }

       // create order id 
    public function verifyOrder($orderId = '')
    {
try {
    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
        'x-api-version' => '2022-01-01',
        'x-client-id' =>  $this->APP_ID, // Replace with your actual appId
        'x-client-secret' => $this->SECRET_KEY, // Replace with your actual secretKey
    ])
    ->get($this->CASH_FREE_URL.'/pg/orders/'.$orderId);
    if ($response->successful()) {
        return $result = $response->json();
        // Handle the successful response here
    } else {
        // Handle the HTTP error response here
        echo "HTTP Error: " . $response->status() . " - " . $response->body();
        die;
    }
} catch (\Exception $e) {
    // Handle any exceptions that may occur during the request
    echo "An error occurred: " . $e->getMessage();
    die;
}



    }

    function encryptor($action, $string) {
        $output = false;
    
        $encrypt_method = "AES-256-CBC";
        //pls set your unique hashing key
        $secret_key = 'aman#$gyan13*&som@$#';
        $secret_iv = 'aman#$gyan13*&som@$#';
    
        // hash
        $key = hash('sha256', $secret_key);
    
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
    
        //do the encyption given text/string/number
        if( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        }
        else if( $action == 'decrypt' ){
            //decrypt the given text/string/number
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
    
        return $output;
    }

    public function packageDetails(Request $request){

        $packageId = $this->encryptor('decrypt', $request->packageId);
        $userId = $this->encryptor('decrypt', $request->user_id) ;
        $getCode = User::select('id','name', 'mobile_no','referral_code')->where('id', $userId)->first();
        return json_encode([
            'status' => 'success', 
            'refId' =>  $this->encryptor('encrypt', $getCode->id), 
            'name' => $getCode->name, 
            'referral_code' => $getCode->referral_code, 
            'packageId' => $packageId,
            'mobile_no' => $getCode->mobile_no
        ]);

    }

    public function checkRefCode(Request $request){

        $getCode = User::select('id','name', 'mobile_no','referral_code')->where('referral_code','=', $request->code)->first();
        if(isset($getCode) && !empty($getCode)){
            return json_encode([
                'status' => 'success', 
                'refId' => $this->encryptor('encrypt', $getCode->id),
                'name' => $getCode->name, 
                'referral_code' => $getCode->referral_code, 
                'mobile_no' => $getCode->mobile_no
            ]);

        }else{
            return json_encode(['status' => 'error']);
        }
    }


    function upgradeReturnUrl (Request $request){
        $orderId = $request->order_id;
        $orderResponse   = $this->verifyOrder($orderId);
        // echo "<pre>"; print_r($orderResponse); die();
        
        $time = time();

        $txStatus = isset($orderResponse['order_status']) ? $orderResponse['order_status']:'';

        if (!empty($txStatus)) {


            $getUserId =  Orders::where('id', $orderId)->first();
            // Auth::loginUsingId($getUserId->user_id);
            // if ($txStatus == 'SUCCESS'){
            if ($txStatus == 'PAID'){
                $txStatus = 'PAYMENT_SUCCESS'; 
                 return redirect('user/thankyou/'.$this->encryptor('encrypt', $orderId).'/?status='.$txStatus)->with('message', 'Congratulations Package Upgraded successfully!');

                Orders::where('id', $orderId)->update(['status_id' => 1]);
                $getpackageInfor = DB::table('packages')->select('id','name')->where('id', $getUserId->package_id)->first();
                
                $this->sendPackageUpgradeMail($orderId); 
                $this->createAffiliate($orderId);
                $dataArr['customer_name'] = $getUserId->customerName;
                $dataArr['amount'] = $getUserId->amount;
                $dataArr['paymentMode'] = $getUserId->paymentMode;
                $dataArr['package'] = $getpackageInfor->name;
                $dataArr['email'] = $getUserId->customerEmail;
                $dataArr['mobile_no'] = $getUserId->customerPhone;
                $dataArr['orderId'] = $getUserId->id;
                $email = $getUserId->customerEmail;
                $emailArr = ['invoice@growthaddicted.com', $getUserId->customerEmail];
                
                $addOn = DB::table('main_course')->select('sub_folder_name')->where('package_id', $getUserId->package_id)->get();
                $dataArr['addOn'] = $addOn;

                $pdf = PDF::loadView('pdf.invoice', compact('dataArr')); 
                
                $file = storage_path('app/public/pdf/invoice-'.$getUserId->customerEmail.'-'.$time.'.pdf');
                if(isset($file) && file_exists($file)){
                   unlink(storage_path('app/public/pdf/invoice-'.$getUserId->customerEmail.'-'.$time.'.pdf'));
                }  
                Storage::put('public/pdf/invoice-'.$getUserId->customerEmail.'-'.$time.'.pdf', $pdf->output());

                $mail = Mail::send('pdf.invoice', ["dataArr"=> $dataArr], function ($message) use ($email, $time, $emailArr)
                {  
                    $file = storage_path('app/public/pdf/invoice-'.$email.'-'.$time.'.pdf');
                    $message->subject('Your Order has been received!');
                    $message->from(env('MAIL_FROM_ADDRESS'),'GROWTH ADDICTED');
                    $message->to($emailArr);
                    $message->attach($file);
                });

                // return redirect('user/courses')->with('message', 'Congratulations Package Upgraded successfully !');

            }else if($txStatus == 'ACTIVE'){
                return redirect('user/dashboard')->with('message', 'Transaction failed. Please try again.');
            }
            else{
                Orders::where('id', $orderId)->update(['status_id' => 2]);
                return redirect('user/dashboard')->with('message', 'Transaction failed. Please try again.');
            }
        }else{
            return redirect('user/dashboard')->with('message', 'Signature not match');
        }

       
        // $dataArr = [];
        // $time = time();
        // $orderId = $request->orderId;
        // $orderAmount = $request->orderAmount;
        // $referenceId = $request->referenceId;
        // $txStatus = $request->txStatus;
        // $paymentMode = $request->paymentMode;
        // $txMsg = $request->txMsg;
        // $txTime = $request->txTime;
        // $signature = $request->signature;
        // $secretkey = $this->SECRET_KEY;
        // $data = $orderId . $orderAmount . $referenceId . $txStatus . $paymentMode . $txMsg . $txTime;
        // $hash_hmac = hash_hmac('sha256', $data, $secretkey, true);
        // $computedSignature = base64_encode($hash_hmac);
        // if ($signature == $computedSignature) {
        //     $getUserId =  Orders::where('id', $orderId)->first();
        //     Auth::loginUsingId($getUserId->user_id);

        //     if ($txStatus == 'SUCCESS'){
        //         Orders::where('id', $orderId)->update(['status_id' => 1, 'referenceId' => $referenceId, 'paymentMode' => $paymentMode]);
        //         $getpackageInfor = DB::table('packages')->select('id','name')->where('id', $getUserId->package_id)->first();
                
        //         $this->sendPackageUpgradeMail($orderId); 
        //         $this->createAffiliate($orderId);
        //         $dataArr['customer_name'] = $getUserId->customerName;
        //         $dataArr['amount'] = $getUserId->amount;
        //         $dataArr['paymentMode'] = $getUserId->paymentMode;
        //         $dataArr['package'] = $getpackageInfor->name;
        //         $dataArr['email'] = $getUserId->customerEmail;
        //         $dataArr['mobile_no'] = $getUserId->customerPhone;
        //         $dataArr['orderId'] = $getUserId->id;
        //         $email = $getUserId->customerEmail;
        //         $emailArr = ['invoice@growthaddicted.com', $getUserId->customerEmail];
                
        //         $addOn = DB::table('main_course')->select('sub_folder_name')->where('package_id', $getUserId->package_id)->get();
        //         $dataArr['addOn'] = $addOn;

        //         $pdf = PDF::loadView('pdf.invoice', compact('dataArr')); 
                
        //         $file = storage_path('app/public/pdf/invoice-'.$getUserId->customerEmail.'-'.$time.'.pdf');
        //         if(isset($file) && file_exists($file)){
        //            unlink(storage_path('app/public/pdf/invoice-'.$getUserId->customerEmail.'-'.$time.'.pdf'));
        //         }  
        //         Storage::put('public/pdf/invoice-'.$getUserId->customerEmail.'-'.$time.'.pdf', $pdf->output());

        //         $body = view('pdf.invoice', compact('dataArr'));
        //         $file = storage_path('app/public/pdf/invoice-'.$email.'-'.$time.'.pdf');
        //         $this->SMTPMailSend($body, $emailArr, 'Your Order has been received!', $file, 2);

        //         return redirect('user/courses')->with('message', 'Congratulations Package Upgraded successfully !');
        //     }else if($txStatus == 'CANCELLED'){
        //         return redirect('user/dashboard')->with('message', $txMsg);
        //     }
        //     else{
        //         Orders::where('id', $orderId)->update(['status_id' => 2]);
        //         return redirect('user/dashboard')->with('message', $txTime);
        //     }
        // }else{
        //     return redirect('user/dashboard')->with('message', 'Signature not match');
        // }
    }



    function upgradePhonepay (Request $request){

        $orderId = $request->transactionId;
        $orderAmount = ($request->amount/100);
        $referenceId = $request->providerReferenceId;
        $txStatus = $request->code;

        $getUserId =  Orders::where('id', $orderId)->first();
        Auth::loginUsingId($getUserId->user_id);

            if ($txStatus == 'PAYMENT_SUCCESS'){
                Orders::where('id', $orderId)->update(['status_id' => 1, 'referenceId' => $referenceId]);
                $getpackageInfor = DB::table('packages')->select('id','name')->where('id', $getUserId->package_id)->first();
                $dataArr['customer_name'] = $getUserId->customerName;
                $dataArr['amount'] = $getUserId->amount;
                $dataArr['paymentMode'] = $getUserId->paymentMode;
                $dataArr['package'] = $getpackageInfor->name;
                $dataArr['email'] = $getUserId->customerEmail;
                $dataArr['mobile_no'] = $getUserId->customerPhone;
                $dataArr['orderId'] = $getUserId->id;
                $email = $getUserId->customerEmail;
                $emailArr = ['invoice@growthaddicted.com', $getUserId->customerEmail];
                
                $addOn = DB::table('main_course')->select('sub_folder_name')->where('package_id', $getUserId->package_id)->get();
                $dataArr['addOn'] = $addOn;

                $pdf = PDF::loadView('pdf.invoice', compact('dataArr')); 
                
                $file = storage_path('app/public/pdf/invoice-'.$getUserId->customerEmail.'-'.$time.'.pdf');
                if(isset($file) && file_exists($file)){
                   unlink(storage_path('app/public/pdf/invoice-'.$getUserId->customerEmail.'-'.$time.'.pdf'));
                }  
                Storage::put('public/pdf/invoice-'.$getUserId->customerEmail.'-'.$time.'.pdf', $pdf->output());

                $body = view('pdf.invoice', compact('dataArr'));
                $file = storage_path('app/public/pdf/invoice-'.$email.'-'.$time.'.pdf');
                $this->SMTPMailSend($body, $emailArr, 'Your Order has been received!', $file, 2);

                return redirect('user/courses')->with('message', 'Congratulations Package Upgraded successfully !');
            }else if($txStatus == 'CANCELLED'){
                return redirect('user/dashboard')->with('message', $txMsg);
            }
            else{
                Orders::where('id', $orderId)->update(['status_id' => 2]);
                return redirect('user/dashboard')->with('message', $txTime);
            }
    }


    public function callbackUpgradePhonePay(Request $request){
        $result = base64_decode($request->response);
        $response = json_decode($result);
      
        $orderId = $response->data->merchantTransactionId; 
        $paymentStatus = $response->data->responseCode; 
        $referenceId = $response->data->transactionId;
        $paymentMode = $response->data->paymentInstrument->type;

        $getUserId =  Orders::select('user_id')->where('id', $orderId)->first();
        Auth::loginUsingId($getUserId->user_id);

        if($paymentStatus == 'SUCCESS'){
            $this->sendPackageUpgradeMail($orderId); 
            $this->createAffiliate($orderId);
        }
    }



    public function createAffiliate($data)
    {
        $getDetails = Orders::findOrFail($data);
        $refUserId = $getDetails->ref_by;
        $amount = $getDetails->amount;
        $package_id = $getDetails->package_id;
        $user_id = $getDetails->user_id;

        $packageAmount = [];
        if(isset($refUserId) && !empty($refUserId)){
        
            $getSponsor = DB::table('users')->select('package_id')->where('id', $refUserId)->first();
            $packageAmount = DB::table('package_comm')->select('direct_comm')
            ->where('from_package', auth()->user()->package_id)
            ->where('to_package_id', $getDetails->package_id)
            ->where('sponsor', $getSponsor->package_id)
            ->first();

        }

        $getUserInfo =  User::select('id', 'referral_code', 'name', 'email')->where('id', $user_id)->first();
        $updateArr = ['package_id' => $package_id, 'order_status' => 1];
       
        if(empty($getUserInfo->referral_code)){
            $referral_code = mb_substr(strtoupper($getDetails->customerName), 0, 4).rand(11111,99999);
            $updateArr['referral_code'] = $referral_code ;
        }

        $result = User::where('id', $user_id)->update($updateArr);

        $query = Affiliate::select('id', 'user_id', 'package_id', 'send_by', 'amount', 'parents');
        
        if(!empty($refUserId)){
            $query->where('send_by', $refUserId);
        }
        if(empty($refUserId)){
            $query->where('user_id', $refUserId);
        }
        $getData = $query->first(); 
        $getAffiliateOrder = Affiliate::where(['order_id' => $getDetails->id])->first();
        
        if(empty($getAffiliateOrder)){

            $insertArr =  Affiliate::Create([
                'user_id' => $user_id,
                'package_id' => $package_id,
                'send_by' => !empty($refUserId) ? $refUserId :  NULL,
                'amount' => $amount,
                'parents' => !empty($getData->parents) ? $getData->parents : NULL,
                'timestamp' => time()
            ]);

            $affId = $insertArr->id;

            $insertArr2 = array(
                'affiliate_id'=> $affId,
                'user_id'=>  !empty($refUserId) ? $refUserId :  NULL,
                'amount' =>  !empty($packageAmount->direct_comm) ? $packageAmount->direct_comm : 0,
                'owner_amount'=> 0,
                'company_amount'=> empty($packageAmount->direct_comm) ? $amount :  ($amount-$packageAmount->direct_comm),
                'timestamp' => time(),
            );
              $insert4 = DB::table('affiliate_comm')->insert($insertArr2);
        }
    }


    public function sendPackageUpgradeMail($data){
      
        $getDetails = Orders::findOrFail($data);
        $packageDetails = DB::table('packages')->select('name')->where('id', $getDetails->package_id)->first();
        $refBy = !empty($getDetails->ref_by) ? $getDetails->ref_by : NULL;
        $dataArr = [];
        $emails = [];

        $packageData = DB::table('packages')->select('id', 'direct', 'passive', 'fund')->where('id', $getDetails->package_id)->first();
        
        $getSponsor = DB::table('users')->select('package_id')->where('id', auth()->user()->ref_by_user)->first();

        if($getDetails->ref_by != ''){
            $getPackageDetails = DB::table('package_comm')->select('amount','direct_comm')
            ->where('from_package', auth()->user()->package_id)
            ->where('to_package_id', $getDetails->package_id)
            ->where('sponsor', $getSponsor->package_id)
            ->first();
            
            $result = User::select('id', 'name', 'email')->where('id', $getDetails->ref_by)->first();
            $email =  $result->email ;
            $dataArr = ['name' => $result->name, 'customer_name' => $getDetails->customerName, 'packageName' => $packageDetails->name, 'amount' => $getPackageDetails->direct_comm];
            $body = view('email.package-bonus', compact('dataArr'));
            $this->SMTPMailSend($body, $email, 'Upgrade Bonus', $file = null, 1);

        }

            $email =  $getDetails->customerEmail ;
            $dataArr = ['name' => $getDetails->customerName , 'packageName' => $packageDetails->name , 'amount' => $getDetails->amount];
            $body = view('email.package-upgrade', compact('dataArr'));
            $this->SMTPMailSend($body, $email, 'Package Upgrade', $file = null, 1);
    }

    public function aboutUs(Request $request){
        return view('about-us');
    }

    public function contactUs(Request $request){
        return view('contact');
    }

    public function termsCondition(Request $request){
        return view('termsCondition');
    }

    public function privacyPolicy(Request $request){
        return view('privacy-policy');
    }

    public function faq(Request $request){
        return view('faq');
    }

    public function refundPolicy(Request $request){
        return view('refund-policy');
    }


    public function courses(Request $request){
        return view('courses');
    }

    public function testEmail(Request $request){
        set_time_limit(0);
        require 'vendor/autoload.php';
        $dataArr = [
            'name' => 'Rakesh', 
            'customer_name' => 'Gyan',
            'package_name' => "ALPHA ",
            'directAmount' => 400
        ];
        
        $htmlTemplate = view('email.new_refferral', compact('dataArr'));
        $file = storage_path('app/public/pdf/invoice-+abkhalidwani374@gmail.com-1686294513.pdf');
        $mail = new PHPMailer;
        $mail->isSMTP();
        // $mail->SMTPDebug = 2;
        $mail->Host = env('MAIL_HOST');
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls'; 
        $mail->Username = env('MAIL_USERNAME');
        $mail->Password = env('MAIL_PASSWORD');
        $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        $mail->addAddress('gyanendram852@gmail.com', 'Receiver Name');
        $mail->Subject = 'NEW REFERRAL';
        $mail->isHTML(true);  
        $mail->Body = $htmlTemplate;
        $mail->addAttachment($file);
        $mail->send();
        if($mail){
            echo "success";
        }
	        
    }


    public function SMTPMailSend($body, $email, $subject, $file = null, $recipt){
        set_time_limit(0);
        require 'vendor/autoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();
        // $mail->SMTPDebug = 2;
        $mail->Host = env('MAIL_HOST');
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls'; 
        $mail->Username = env('MAIL_USERNAME');
        $mail->Password = env('MAIL_PASSWORD');
        $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        if($recipt == 1){ $mail->addAddress($email); }
        if($recipt == 2){ foreach ($email as $key => $row) {  $mail->addAddress($row);  } }
        $mail->Subject = $subject;
        $mail->isHTML(true);  
        $mail->Body = $body;
        if( isset($file) && !empty($file) ){ $mail->addAttachment($file); }
        $mail->send();
    }


    public function checkout(Request $request){
       
        $refId = !empty($request->refId) ? $this->encryptor('decrypt', $request->refId) : 0;
        $packageId = ($request->type == 0) ? $this->encryptor('decrypt', $request->packageId) : $request->packageId;
        if(empty($packageId)){
            $packageId = $request->packageId; 
        }
        $result = DB::table('packages')->where('id', $packageId)->first();

        $addOn = DB::table('main_course')->select('sub_folder_name')->where('package_id', $packageId)->get();

        $amount = ($refId == 0) ? $result->amount : $result->affiliate_price; 
        
        $addonHtml = '<div class="addOnProduct" style="font-size:14px; margin-bottom:20px; margin-left:33px; line-hight:2">';

        foreach ($addOn as $row) {
            $addonHtml.= '<small>'. $row->sub_folder_name.' x 1'.'</small>'.'<br>';
        }

        $addonHtml.= '</div>';

        $image =  env('APP_URL').'/public/packages/'.$result->image;
        $html = '';
        $html.= '<p>Your Order</p>';
        $html.= '<table class = "table" style="width: 100%">';
        $html.= ' <tr>
                   
                    <td colspan="2">Product</td>
                    <td>SubTotal</td>
                </tr>

                <tr>
                   
                    <td colspan="2"> <p>'.$result->name.'           x 1 </p>
                    <br>
                        '.$addonHtml.' 
                    </td>
                    <td> <strong> ₹'.$amount.'</strong> </td>
                </tr>

                <tr>
                    <th colspan="2">SubTotal : </th>
                    <td> ₹'.$amount.'</td>
                </tr>

                <tr>
                    <th colspan="2">Total : </th>
                    <td> ₹'.$amount.'</td>
                </tr>';
        $html.= '</table>';

        return $html;
    }

    public function alphaCourse(Request $request){
        return view('alpha-course');
    }
    public function digitalSkillHub(Request $request){
        return view('digital-skill-hub');
    }
    public function personalBrandingHub(Request $request){
        return view('personal-branding-hub');
    }
    public function iconic(Request $request){
        return view('iconic');
    }
    
}
