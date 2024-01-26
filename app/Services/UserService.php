<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Orders;
use App\Models\Affiliate;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Mail;
use PDF;
use Storage;
use PHPMailer\PHPMailer\PHPMailer;  
use PHPMailer\PHPMailer\Exception;
class UserService extends Controller
{

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

    public function createOrder($data){
        
        $orderId = Orders::insertGetId([
            'customerName' => $data['name'],
            'customerPhone' => $data['mobile_no'],
            'customerEmail' => $data['email'],
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

    public function createUser($data){
        $userId = User::Create([
            'name' =>  $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'user_pass' => $data['password'],
            'mobile_no' =>  $data['mobile_no'],
            'state' => $data['state'],
            'package_id' => $data['package'],
            'terms_accept' => !empty($data['terms_accept']) ? $data['terms_accept'] : 1,
            'timestamp' => time(),
            'ref_by_user' => $data['ref_by']
        ]);

        return $userId->id;
    }

    public function sendWelcomMail($data){
            
            $getDetails = Orders::findOrFail($data);
            $getpackageInfor = DB::table('packages')->select('id','name')->where('id', $getDetails->package_id)->first();
            $refBy = !empty($getDetails->ref_by) ? $getDetails->ref_by : NULL;
            $dataArr = [];
            
            $dataArr['amount'] = $getDetails->amount;
            $dataArr['paymentMode'] = $getDetails->paymentMode;
            $dataArr['package'] = $getpackageInfor->name;
            $dataArr['email'] = $getDetails->customerEmail;
            $dataArr['mobile_no'] = $getDetails->customerPhone;
            $dataArr['orderId'] = $getDetails->id;
            $email = $getDetails->customerEmail;
            $emailArr = ['invoice@growthaddicted.com', $getDetails->customerEmail];
            $time = time();

            $emails = '';
            $time = time();
            if($getDetails->ref_by != ''){
                $result = User::select('id', 'name', 'email')->where('id', $getDetails->ref_by)->first();
                $emails =  $getDetails->customerEmail ;
                $dataArr['name'] =  $result->name;
                $dataArr['customer_name'] = $getDetails->customerName;
                    
                $referral_code = mb_substr(strtoupper($getDetails->customerName), 0, 4).rand(11111,99999);
                $updateArr = ['referral_code' => $referral_code, 'status' => 1, 'ref_by_user' => $refBy, 'order_status' => 1];
                $update = User::where('id', $getDetails->user_id)->update($updateArr); 
            }else{
                $emails =  $getDetails->customerEmail ;
                $dataArr['customer_name'] = $getDetails->customerName;
                $referral_code = mb_substr(strtoupper($getDetails->customerName), 0, 4).rand(11111,99999);
                $updateArr = ['referral_code' => $referral_code, 'status' => 1, 'ref_by_user' => $refBy, 'order_status' => 1];
                $update = User::where('id', $getDetails->user_id)->update($updateArr); 
            }

            $addOn = DB::table('main_course')->select('sub_folder_name')->where('package_id', $getDetails->package_id)->get();
            $dataArr['addOn'] = $addOn;

            $pdf = PDF::loadView('pdf.invoice', compact('dataArr')); 
            
            $file = storage_path('app/public/pdf/invoice-'.$getDetails->customerEmail.'-'.$time.'.pdf');
            if(isset($file) && file_exists($file)){
               unlink(storage_path('app/public/pdf/invoice-'.$getDetails->customerEmail.'-'.$time.'.pdf'));
            }  
            Storage::put('public/pdf/invoice-'.$getDetails->customerEmail.'-'.$time.'.pdf', $pdf->output());

            $body = view('pdf.invoice', compact('dataArr'));
            $file = storage_path('app/public/pdf/invoice-'.$email.'-'.$time.'.pdf');
            $this->SMTPMailSend($body, $emailArr, 'Your Order has been received!', $file, 2);

            $welcomeBody = view('email.welcome', compact('dataArr'));
            $this->SMTPMailSend($body, $emails, 'Welcome to Growth Addicted', $file, 1);
    }

    public function createAffiliate($data){

        $getDetails = Orders::findOrFail($data);
        $refUserId = $getDetails->ref_by;
        $amount = $getDetails->amount;
        $package_id = $getDetails->package_id;
        $user_id = $getDetails->user_id;
        $getAffiliateOrder = Affiliate::where(['order_id' => $getDetails->id])->first();
        if(isset($refUserId) && !empty($refUserId)){
            $getRefPack = DB::table('users')->select('name','package_id','email','ref_by_user')->where('id', $refUserId)->first();
            $getSponsor = DB::table('users')->select('name','package_id', 'email')->where('id', $getRefPack->ref_by_user)->first();
            $packageData = DB::table('packages')->select('id','name', 'direct', 'passive', 'fund')->where('id', $package_id)->first();
            $packageAmount = [];
            $updateArr = [];
            
            $updateArr['from_package'] = !empty($getRefPack->package_id) ? $getRefPack->package_id : NULL;
            $updateArr['to_package_id'] = !empty($package_id) ? $package_id : NULL;

            if(isset($getSponsor) && !empty($getSponsor)){
                $packageAmount = DB::table('package_price')->select('id', 'amount' ,'direct', 'passive')
                ->where('from_package', $getRefPack->package_id)
                ->where('to_package_id', $package_id)
                ->where('sponsor', $getSponsor->package_id)
                ->first();
                $updateArr['sponsor'] = !empty($getSponsor->package_id) ? $getSponsor->package_id : NULL;
           }else if(empty($getSponsor) && !empty($getRefPack)){
                $packageAmount = DB::table('package_price')->select('id', 'amount' ,'direct', 'passive')
                ->where('from_package', $getRefPack->package_id)
                ->where('to_package_id', $package_id)
                ->first();
                // $updateArr['sponsor'] = !empty($getSponsor->package_id) ? $getSponsor->package_id : NULL;
           }

            $directAmount =  !empty($packageAmount) ? $packageAmount->direct : $packageData->direct;
            $passiveAmount = !empty($packageAmount) ? $packageAmount->passive : $packageData->passive;
            $fundAmount = $packageData->fund;

            $updateArr['direct_income'] =  $directAmount;
            $updateArr['passive'] = $passiveAmount;
            $updateArr['fund'] = $fundAmount;

            $update = DB::table('orders')->where('id', $getDetails->id)->update($updateArr);

            if(isset($getRefPack) && !empty($getRefPack)){
                $email = $getRefPack->email;
                $dataArr = [
                    'name' => $getRefPack->name, 
                    'customer_name' => $getDetails->customerName,
                    'package_name' => $packageData->name,
                    'directAmount' => $directAmount
                ];

                $body = view('email.new_refferral', compact('dataArr'));
                $this->SMTPMailSend($body, $email, 'NEW REFERRAL', $file = null, 1);

            }

            if(isset($getSponsor) && !empty($getSponsor)){
                $email = $getSponsor->email;
                $dataArr = [
                    'name' => $getSponsor->name, 
                    'customer_name' => $getRefPack->name,
                    'package_name' => $packageData->name,
                    'passiveAmount' => $passiveAmount
                ];

                $body = view('email.team_helping_bonus', compact('dataArr'));
                $this->SMTPMailSend($body, $email, 'TEAM HELPING BONUS', $file=null, 1);
            }

            $getData = Affiliate::select('id', 'user_id', 'package_id', 'send_by', 'amount', 'parents')
            ->where('send_by', $refUserId)->first();
            
            $parentId = '';
            $total_parents = [];
            if(isset($getData) && !empty($getData)){
                $tempIds = !empty($getData->parents) ? explode(',', $getData->parents) : [];
                $parentId = implode(',', $tempIds); 
                $parentId = rtrim($parentId, ',');
                $total_parents = !empty($getData->parents) ? $parentId.','.$user_id : $user_id;
            }else{
               
                $getData = Affiliate::select('id', 'user_id', 'package_id', 'send_by', 'amount', 'parents')
                ->where('user_id', $refUserId)->first();
                $tempIds = !empty($getData->parents) ? explode(',', $getData->parents) : [];
                $total_parents = $tempIds;
                if(count($tempIds) == 3){
                    array_push($total_parents, $refUserId);
                    array_pop($tempIds);
                    array_unshift($tempIds,$refUserId);
                }else{

                    array_push($total_parents, $refUserId);
                    array_unshift($tempIds,$refUserId);
                }
                $parentId = implode(',', $tempIds); 
                $parentId = rtrim($parentId, ',');
                $total_parents = implode(',', $total_parents); 
                $total_parents = rtrim($total_parents, ',');
                $total_parents = !empty($tempIds) ? $total_parents.','.$user_id : $user_id;
            }
           

        if(empty($getAffiliateOrder)){
        
            $insertAff =  Affiliate::Create([
                'user_id' => $user_id,
                'package_id' => $package_id,
                'send_by' => $refUserId,
                'amount' => $amount,
                'parents' => $parentId,
                'total_parents' => $total_parents,
                'timestamp' => time(),
                'order_id' => $getDetails->id
            ]);
            $affId = $insertAff->id;
        
           
            if(isset($tempIds) && !empty($tempIds)){
                
                for($i=0; $i < count($tempIds); $i++){
                    $insertArr = array(
                        'affiliate_id'=> $affId,
                        'user_id'=> ($tempIds[$i]) ? ($tempIds[$i]) : null,
                        'timestamp' => time(),
                    );
                    if(count($tempIds) == 1){
                        if($i == 0){
                            $insertArr['amount'] = $directAmount;
                            $insertArr['owner_amount'] = 0;
                            $insertArr['comm_status'] = 1;
                            $insertArr['company_amount'] = $amount- $directAmount;
                        }
                    }

                    if(count($tempIds) == 2){
                        if($i == 0){
                            $insertArr['amount'] = $directAmount;
                            $insertArr['owner_amount'] = 0;
                            $insertArr['company_amount'] = 0;
                            $insertArr['comm_status'] = 1;
                        }elseif($i == 1){
                            $getThird = User::select('enable_third_tier', 'enable_team_helping')->where('id', $tempIds[$i])->first();
                            if($getThird->enable_team_helping == 0){
                                $insertArr['amount'] = 0;
                                $insertArr['owner_amount']= 0;
                                $insertArr['comm_status'] = 2;
                                $insertArr['company_amount'] = ($amount - $directAmount);

                            }else{
                                $insertArr['amount'] = $passiveAmount;
                                $insertArr['owner_amount']= 0;
                                $insertArr['comm_status'] = 2;
                                $insertArr['company_amount'] = $amount - ( $directAmount+ $passiveAmount);

                            }
                        }
                    }

                    if(count($tempIds) == 3){
                        if($i == 0){
                            $insertArr['amount'] = $directAmount;
                            $insertArr['owner_amount'] = 0;
                            $insertArr['company_amount'] = 0;
                            $insertArr['comm_status'] = 1;
                        }elseif($i ==1){
                             $getThird = User::select('enable_third_tier', 'enable_team_helping')->where('id', $tempIds[$i])->first();
                            if($getThird->enable_team_helping == 0){
                                $insertArr['amount'] = 0;
                                $insertArr['owner_amount']= 0;
                                $insertArr['comm_status'] = 2;
                                $insertArr['company_amount'] = $passiveAmount;
                            }else{
                                $insertArr['amount'] = $passiveAmount;
                                $insertArr['owner_amount'] = 0;
                                $insertArr['company_amount'] = 0;
                                $insertArr['comm_status'] = 2;
                            }

                        }elseif($i == 2){
                            $getThird = User::select('enable_third_tier', 'enable_team_helping')->where('id', $tempIds[$i])->first();
                            if($getThird->enable_third_tier == 1){
                                $insertArr['amount'] = $fundAmount;
                                $insertArr['owner_amount']= 0;
                                $insertArr['comm_status'] = 3;
                                $insertArr['company_amount'] = $amount-($directAmount+$passiveAmount+$fundAmount);
                            }else{
                                $insertArr['amount'] = 0;
                                $insertArr['comm_status'] = 3;
                                $insertArr['owner_amount'] = 0;
                                $insertArr['company_amount'] = $amount-($directAmount+$passiveAmount);
                            }
                           
                        }
                        
                    }
                 
                $insert4 = DB::table('affiliate_comm')->insert($insertArr);
                }
               
             
            }
        }
        }else{

        	if(empty($getAffiliateOrder)){
         
	            $insertAff =  Affiliate::Create([
	                'user_id' => $user_id,
	                'package_id' => $package_id,
	                'send_by' => NULL,
	                'amount' => $amount,
	                'parents' => NULL,
	                'timestamp' => time(),
	                'order_id' => $getDetails->id
	            ]);
	            $affId = $insertAff->id;

	            $insertArr = array(
	                'affiliate_id'=> $affId,
	                'user_id'=> $user_id,
	            );
	            

	            $insertArr['amount'] = 0;
	            $insertArr['owner_amount']= 0;
	            $insertArr['comm_status'] = 3;
	            $insertArr['timestamp'] = time();
	            $insertArr['company_amount'] = $amount;
	            $insert4 = DB::table('affiliate_comm')->insert($insertArr);
	        }
        }

    }

    public function sendPushNotification($title, $message, $imgUrl) {  
        $firebaseToken = DB::table('device_token')->whereNotNull('token')->pluck('token')->all();
        $getFcmKey = env('FCM_KEY');;    
        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';            
        $headers = array("authorization: key=" . $getFcmKey . "",
            "content-type: application/json"
        );    

        $notification = [
            'title' => strip_tags($title),
            'body' => strip_tags($message),
            'sound' => true,
            "image" => $imgUrl,
        ];
        $extraNotificationData = ["message" => $notification];

        $fcmNotification = [
            'registration_ids' =>$firebaseToken,
            'notification' => $notification,
            'data' => $extraNotificationData,
        ];

        $ch = curl_init();
        $timeout = 120;
        curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);  
        curl_close($ch);
        return true;
    }

    public function phonepay($data){
        $apiEndPoint = '/pg/v1/pay';
        $saltKey = "977a4919-5a26-4d36-8452-f9c0340bf37f";
        $index = 1;
        $postData = [
          "merchantId" => "GROWTHADDICTONLINE",
          "merchantTransactionId" => $data['orderId'],
          "merchantUserId" => $data['user_id'],
          "amount" => $data['amount'].'00',
          "redirectUrl" => "https://www.growthaddicted.com/return-url-phonePay",
          "redirectMode" => "POST",
          "callbackUrl" => "https://www.growthaddicted.com/callback-url-phonePay",
          "mobileNumber" => $data['mobile_no'],
          "paymentInstrument" => [
             "type" => "PAY_PAGE"
            ]
        ];

        $jsonData = json_encode($postData);
        $base64Data = base64_encode($jsonData);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.phonepe.com/apis/hermes/pg/v1/pay');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData) );


        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'X-VERIFY:'.hash('sha256', $base64Data."/pg/v1/pay".$saltKey).'###1';
        $dataArr = ['request' => $base64Data];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dataArr) );
        
        $result = curl_exec($ch);
        return json_decode($result);
    }

    public function upgradePhonePay($data){
        $apiEndPoint = '/pg/v1/pay';
        $saltKey = "977a4919-5a26-4d36-8452-f9c0340bf37f";
        $index = 1;
        $postData = [
          "merchantId" => "GROWTHADDICTONLINE",
          "merchantTransactionId" => $data['orderId'],
          "merchantUserId" => $data['user_id'],
          "amount" => $data['amount'].'00',
          "redirectUrl" => "https://www.growthaddicted.com/upgrade-phonepay",
          "redirectMode" => "POST",
          "callbackUrl" => "https://www.growthaddicted.com/callback-upgrade-phonepay",
          "mobileNumber" => $data['mobile_no'],
          "paymentInstrument" => [
             "type" => "PAY_PAGE"
            ]
        ];

        $jsonData = json_encode($postData);
        $base64Data = base64_encode($jsonData);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.phonepe.com/apis/hermes/pg/v1/pay');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData) );


        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'X-VERIFY:'.hash('sha256', $base64Data."/pg/v1/pay".$saltKey).'###1';
        $dataArr = ['request' => $base64Data];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dataArr) );
        
        $result = curl_exec($ch);
        return json_decode($result);
    }

}