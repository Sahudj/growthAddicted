<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Orders;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;
use Session;
use Mail;
use App\Mail\Notification;
use Illuminate\Support\Facades\Crypt;
use Vimeo\Laravel\Facades\Vimeo;
use DateTime;
use App\Services\UserService;
use PDF;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;

class CoursesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->middleware('auth');
        $this->userService = $userService;

        //SANDBOX
        $this->APP_ID = "198789cd2991db8a7d2825fcef987891";
        $this->SECRET_KEY = "05d9ef9d3d1274b598c6ef25d46710eae7f54a36";
        $this->CASH_FREE_URL = "https://sandbox.cashfree.com";

        if (env('CASH_FREE_MODE') == 'PRODUCTION') {
            $this->APP_ID = "247218cebeaa22705a48b4532c812742";
            $this->SECRET_KEY = "d5569182cf021436e7d7c256130604290771ee6b";
            $this->CASH_FREE_URL = "https://api.cashfree.com";
        }
    }

    function encryptor($action, $string)
    {
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
        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if ($action == 'decrypt') {
            //decrypt the given text/string/number
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }

        return $output;
    }

    public function courses(Request $request)
    {

        if (auth()->user()->order_status == 0) {
            return redirect()->to('user/dashboard');
        }
        $getsubPackages = DB::table('packages')->select('sub_packages')->where('id', auth()->user()->package_id)->first();

        if (isset($getsubPackages->sub_packages) && !empty($getsubPackages->sub_packages)) {
            $getCourses = DB::table('packages')->select('*')->whereIn('id', explode(',', $getsubPackages->sub_packages))->get();
        } else {
            $getCourses = DB::table('packages')->select('*')->where('id', auth()->user()->package_id)->get();
        }
        $getInfo = DB::table('packages')->select('name')->where('id', auth()->user()->package_id)->first();
        return view('user.courses.courses', compact('getCourses', 'getInfo'));
    }

    public function myCourses(Request $request, $package_id, $folderId, $courseName)
    {
        if (auth()->user()->order_status == 0) {
            return redirect()->to('user/dashboard');
        }
        $package_id = $this->encryptor('decrypt', $package_id);
        $folderId = $this->encryptor('decrypt', $folderId);
        $courseName = $this->encryptor('decrypt', $courseName);
        $getCourses = DB::table('courses')->where('package_id', $package_id)->first();
        $videos =  Vimeo::request('/users/182005276/projects/' . $folderId . '/videos', ['per_page' => 100, 'sort' => 'alphabetical'], 'GET');
        //echo "<pre>"; print_r($videos); die();
        $ids = DB::table("gulmetVideo")->select('assets_id')->where('folder_id', $folderId)->first();
        $assetsIds = explode(',', $ids->assets_id);
        return view('user.courses.all-cources', compact('assetsIds', 'courseName'));    
    }

    public function eloboratedSpecificCourse(Request $request,$package_id)
    {
        $package_id = $this->encryptor('decrypt', $package_id);
        $getCourses = DB::table('courses')->where('package_id', $package_id)->first();
        return view('alpha-course', compact('getCourses'));  
    }

    public function upgradeCourses(Request $request)
    {
        // if(auth()->user()->order_status == 0){
        //     return redirect()->to('user/dashboard');
        // }
        $packageId = $this->encryptor('decrypt', $request->_sessionToken);

        $order_status = auth()->user()->order_status;
        if ($order_status == 0) {
            $getPackageDetails = DB::table('packages')->select('amount')->where('id', $packageId)->first();
        } else {
            $getPackageDetails = DB::table('package_comm')->select('amount')
                ->where('from_package', auth()->user()->package_id)
                ->where('to_package_id', $packageId)
                ->first();
        }

        $amount = $getPackageDetails->amount;
        $now = new DateTime();
        $ctime = $now->format('Y-m-d H:i:s');
        $input = $request->all();
        $input['ctime'] = $ctime;
        $input['amount'] = $amount;
        $input['package'] = $packageId;
        $input['user_id'] = auth()->user()->id;
        $input['ref_by'] = auth()->user()->ref_by_user;
        $orderId = $this->createOrder($input);
        $secretKey =  $this->SECRET_KEY;

        $input['orderId'] = $orderId;
        $input['mobile_no'] = auth()->user()->mobile_no;

        $postData = array(
            "appId" => $this->APP_ID,
            "orderId" => $orderId,
            "orderAmount" => $amount,
            "orderCurrency" => 'INR',
            "orderNote" => 'Wallet',
            "customerName" => auth()->user()->name,
            "customerPhone" => auth()->user()->mobile_no,
            "customerEmail" => auth()->user()->email,
            'secretKey' => $secretKey,
        );

        if ($order_status == 0) {

            $result = $this->userService->phonepay($input);
            $redirectUrl = $result->data->instrumentResponse->redirectInfo->url;
            return redirect()->away($redirectUrl);

            // $postData["returnUrl"] = url('return-url?order_id='.$orderId);
            // $postData["notifyUrl"] = url('notify_url');
            //  return view('cashfree_confirmation')->with($postData);
        } else {


            //  $postData = array(
            //     "appId" => $this->APP_ID,
            //     "orderId" => $orderId,
            //     "orderAmount" => $amount,
            //     "orderCurrency" => 'INR',
            //     "orderNote" => 'Wallet',
            //     'customerId' =>auth()->user()->id,
            //     "customerName" => auth()->user()->name,
            //     "customerPhone" => auth()->user()->mobile_no,
            //     "customerEmail" => auth()->user()->email,
            //     'secretKey' => $secretKey,
            //     "returnUrl" => url('upgrade-return-url/?order_id={order_id}'), // 03-09-2023
            // "notifyUrl" => url('notify_url'),
            //     );

            $postData = array(
                "appId" => $this->APP_ID,
                "orderId" => $orderId,
                "orderAmount" => $amount,
                "orderCurrency" => 'INR',
                "orderNote" => 'Wallet',
                "customerName" => auth()->user()->name,
                "customerPhone" => auth()->user()->mobile_no,
                "customerEmail" => auth()->user()->email,
                'customerId' => auth()->user()->id,
                "password" => auth()->user()->password,
                "returnUrl" => url('upgrade-return-url/?order_id={order_id}'), // 03-09-2023
                "notifyUrl" => url('notify_url'),
                'secretKey' => $secretKey,
            );

            $orderResponse = $this->createOrderId($postData);
            //echo "<pre>"; print_r($orderResponse); die();

            return view('cashfree_confirmation')->with($orderResponse);


            // return view('cashfree_confirmation')->with($orderResponse);

            //     $postData["returnUrl"] = url('upgrade-return-url?order_id='.$orderId);
            //     return view('upgrade-package')->with($postData);
        }
    }



    function createOrderId($postData = '')
    {

        try {
            $client = new Client();

            $url = $this->CASH_FREE_URL . '/pg/orders';


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
                    'customer_id' => strval($postData['customerId']),
                    'customer_name' => $postData['customerName'],
                    'customer_email' => $postData['customerEmail'],
                    'customer_phone' => $postData['customerPhone'],
                ],
                'order_meta' => [
                    'return_url' => $postData['returnUrl'],
                    'notify_url' => $postData['notifyUrl']
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

    public function createOrder($data)
    {
        $orderId = Orders::insertGetId([
            "customerName" => auth()->user()->name,
            "customerPhone" => auth()->user()->mobile_no,
            "customerEmail" => auth()->user()->email,
            'amount' => $data['amount'],
            'created_at' => $data['ctime'],
            'status_id' => 3,
            'package_id' => $data['package'],
            'user_id' => $data['user_id'],
            'ref_by' => $data['ref_by'],
            'timestamp' => time()
        ]);
        return $orderId;
    }


    public function generatePDF(Request $request, $courseName)
    {
        $rand = rand(111111111, 999999999);
        $data = [
            'title' => $courseName,
            'date' => date('m/d/Y'),
            'certificateNo' => $rand
        ];

        DB::table('courseCertificate')->insert(
            [
                'user_id' => auth()->user()->id,
                'course_name' => $courseName,
                'certificate_no' => $rand,
            ]
        );

        //echo  View('user.courses.certificate', $data); die();
        $pdf = PDF::loadView('user.courses.certificate', $data);
        $pdf->setPaper('letter', 'landscape');
        // $pdf->setPaper(array(0, 0, 600, 786), 'landscape');
        // return $pdf->stream('itsolutionstuff.pdf', array('Attachment'=>0));       
        return $pdf->download($courseName . 'certificate-.pdf');
    }
}
