<?php

namespace App\Http\Controllers\Manager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\States;
use Illuminate\Support\Facades\File;  
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;
use Session;
use Mail;
use App\Mail\Notification;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

class ManagerController extends Controller
{
 
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function timeData(){
        date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
        

        $previous =  date('Y-m-d');
        $previous = strtotime($previous);
        $previous = strtotime("midnight", $previous);
        $todaytimestamp = strtotime('today midnight');
       
        $lastSevendays = date('Y-m-d', strtotime('-7 days'));
        $previousdays = date('Y-m-d', strtotime('-1 day'));
        echo $previousdays; 
        echo "<br>";
        
        echo $previousdays; die();

    }

    public function index(){
        date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)

        $userId = auth()->user()->id;
        $fromTimestamp = time();
        $lastSevendays = date('Y-m-d', strtotime('-7 days'));
        
        $previous =  date('Y-m-d');
        $previous = strtotime($previous);
        $previous = strtotime("midnight", $previous);
        $todaytimestamp = strtotime('today midnight'); 

        $previousdays = date('Y-m-d', strtotime('-1 day'));

        $timestamp = date('d-m-Y 11:59:00 A');
        $timestamp = strtotime($timestamp);

        $lastThirtydays = date('Y-m-d', strtotime('-30 days'));

        $totalFunds = DB::table('affiliate_comm')->where('user_id', $userId)
        ->where('status', 1)->where('comm_status', 3)->sum('amount');

        $todayEarning = DB::table('affiliate_comm')->where('user_id', $userId)
        ->where('timestamp', '>', $todaytimestamp)
        /*->whereDate('created_at', Carbon::today())*/
        ->whereIn('status', [1,2])
        ->where('comm_status', 1)->sum('amount');

        $todayPayout = DB::table('affiliate_comm')->where('user_id', $userId)
        ->where('affiliate_comm.status', 1)
        ->whereIn('comm_status', [1,2])->sum('amount');
       
        $todayTeamHelpingBonus = DB::table('affiliate_comm')->where('user_id', $userId)
        ->whereIn('status', [1,2])
        ->where('timestamp', '>', $todaytimestamp)
        /*->whereDate('created_at', Carbon::today())*/
        ->where('comm_status', 2)->sum('amount');

        $teamHelpingBonus = DB::table('affiliate_comm')->where('user_id', $userId)
        ->whereIn('status', [1,2])
        ->where('comm_status', 2)->sum('amount');
       

        $lastSevenEarning = DB::table('affiliate_comm')
        ->where('user_id', $userId)
        ->whereBetween('timestamp', [ strtotime($lastSevendays) , $timestamp ])
        ->whereIn('comm_status', [1,2])
        /*->where('status', 1)*/
        ->sum('amount');

        $earningthisMonth = DB::table('affiliate_comm')->where('user_id', $userId)
        ->whereBetween('timestamp', [ strtotime($lastThirtydays) , $timestamp])
        ->whereIn('comm_status', [1,2])
        /*->where('status', 1)*/
        ->sum('amount');

        $alltime = DB::table('affiliate_comm')->where('user_id', $userId)
        /*->where('status', 1)*/
        ->whereIn('comm_status', [1,2])->sum('amount');
        $totalComm =  DB::table('affiliate_comm')->select(DB::raw('group_concat(amount) as amount'), )->where('user_id', $userId)->where('status', 1)->first();
        $maxValue = !empty($totalComm) ? max(explode(',',$totalComm->amount)) : 0;
        return view('user.dashboard', compact('maxValue','todayTeamHelpingBonus','teamHelpingBonus','todayEarning','totalFunds','lastSevenEarning','earningthisMonth','alltime', 'totalComm', 'todayPayout'));
    }

    public function updateProfile(){
        $id = Auth()->user()->id;
        $getDetails = User::find($id);
        $states =  States::all();
        return view('user.editProfile', compact('getDetails', 'states'));   
    }
    
    public function updateData(Request $request){
      
        $profile_pic = !empty($request->hidden_image) ? $request->hidden_image : '';

        if ($files = $request->file('profile_pic')) {
            $profile_pic = $files->getClientOriginalExtension();
            $profile_pic = 'profile_pic_'.time().'.'.$profile_pic; 
            $files->move(public_path().'/profile_pic/', $profile_pic);
        }

        $id = Auth()->user()->id;
        $username = !empty($request->name) ? $request->name : '';
        $email = !empty($request->email) ? $request->email : '' ;
        $password = !empty($request->password) ? $request->password : '' ;
        $state = !empty($request->state) ? $request->state : '';
        $phone = !empty($request->phone) ? $request->phone : '' ;
        
        $updateArr = [
            'name' => $username,
            'email' => $email,
            'mobile_no' => $phone,
            'state' => $state,
            'gender' => !empty($request->gender) ? $request->gender : '',
            'dob' => !empty($request->dob) ? $request->dob : NULL,
            'address' => !empty($request->address) ? $request->address : NULL,
            'city' => !empty($request->city) ? $request->city : NULL,
            'pin_code' => !empty($request->pin_code) ? $request->pin_code : NULL,
            'profile_pic' => $profile_pic
        ]; 

        if(!empty($password)){
            $updateArr['password'] = Hash::make($password);
        }
        $update = User::find($id)->update($updateArr);
        
        if($update){
           return redirect('user/profile')->with('message', 'Details Updated Successfully!');   
        }
    }

    public function editUserForm(Request $request ,$id){
        $getDetails = User::find($id);
        return view('office-manager.user.edit', compact('getDetails'));
    }
    

    public function thankyou(Request $request , $orderId){
        $status = $request->status;
        $orderId = $this->encryptor('decrypt', $orderId);
        $getOrderDetails = DB::table('orders')->select('orders.*','packages.name', 'users.name as username')
        ->leftJoin('packages', 'orders.package_id', '=', 'packages.id')
        ->leftJoin('users', 'orders.ref_by', '=', 'users.id')
        ->where('orders.id', $orderId)->first();
        //echo "<pre>"; print_r($getOrderDetails); die();
        return view('thankyou', compact('getOrderDetails', 'status'));
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

    public function updateUserDetails(Request $request){

        $id = $request->userUpdateId;
        $input = request()->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|min:6|max:32',
            'mobile_no' => 'required|min:10|max:12'
        ]);
      
        $resume = !empty($request->hiddenResumeDoc) ? $request->hiddenResumeDoc :  '';

        if ($files = $request->file('abuse_doc')) {
            $abuse_doc = $files->getClientOriginalExtension();
            $abuse_doc = 'abuse_doc_'.time().'.'.$abuse_doc; 
            $files->move(public_path().'/document/', $abuse_doc);
        }
        $updateArr = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'role_type' => $request->user_role,
            'email' => $request->email,
            'password' =>Hash::make($request->password),
            'status' => $request->status,
            'user_pass' => $request->password,
            'mobile_no' => !empty($request->mobile_no) ? $request->mobile_no : '',
            'state' => !empty($request->state) ? $request->state : '',
        ];

        $update = User::find($id)->update($updateArr);
            return redirect('user/user/edit/'.$id)->with('message', 'Users details updated successfully!');
    }
    


    public function changePassword(Request $request){
        return view('user.changePassword');
    }

    public function generatePasswordLink(Request $request){
        return "Working on";
    }

    public function bankDetails(Request $request){
        $id = Auth()->user()->id;
        $getDetails = User::find($id);
        $states =  States::all();
        $getBankInfo = DB::table('bankdetails')->where('user_id', $id)->first();
        $reqInfo = DB::table('user_account_request')->where('user_id', $id)->where('status', 0)->orderBy('id', 'desc')->first();
        return view('user.bank.bank', compact('getDetails', 'states', 'getBankInfo', 'reqInfo'));
    }

    public function bankForm(Request $request){
        return view('user.bank.form');
    }

    public function sendReqChangeAccount(Request $request){
        
        $insertArr = [
            'bankName' => $request->bank_name,
            'account_no' => $request->account_no,
            'ifsc_code' => $request->ifsc_code,
            'user_id' => auth()->user()->id,
        ];
        $insert = DB::table('user_account_request')->insert($insertArr);

        if($insert){
             return redirect('user/change-bank-details/')->with('message', 'Request send successfully!');
        }

    }

    public function updateBankDetails(Request $request){

        $id = Auth()->user()->id;
        if (! File::exists(public_path('document/'))) {
            File::makeDirectory(public_path('document/'), 0775, true);
        }

        $frontSide = !empty($request->hidden_doc_front_side_image) ? $request->hidden_doc_front_side_image : '';
        if ($files = $request->file('doc_front_side')) {
            $frontSide = $files->getClientOriginalExtension();
            $frontSide = 'frontSide_'.time().'.'.$frontSide; 
            $files->move(public_path().'/document/', $frontSide);
        }

        $backendSide = !empty($request->hidden_doc_back_side_image) ? $request->hidden_doc_back_side_image : '';

        if ($files = $request->file('doc_back_side')) {
            $backendSide = $files->getClientOriginalExtension();
            $backendSide = 'backendSide_'.time().'.'.$backendSide; 
            $files->move(public_path().'/document/', $backendSide);
        }

        $userUpdateArr = [
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'pin_code' => $request->pin_code,
        ];
        $updateUser = User::findOrFail($id)->update($userUpdateArr);
        
        $update = DB::table('bankdetails')->updateOrInsert(
                ['user_id' => auth()->user()->id],
                [
                    'document1' => $frontSide,
                    'document2' => $backendSide,
        ]);

        if($request->bankStatus == 0){
  
            $input = $request->all();
            $update = DB::table('bankdetails')->updateOrInsert(
                ['user_id' => auth()->user()->id],
                [
                    'document_type' => $request->document_type,
                    'identity_no' =>$request->documentNo ,
                    'identity_name' => $request->documentName,
                    'bank_name' => $request->bank_name,
                    'account_no' => $request->account_no,
                    'ifsc_code' => $request->ifsc_code,
                    'document1' => $frontSide,
                    'document2' => $backendSide,
                ]);

        $postData = [
            "name" => auth()->user()->name,
            "email" =>auth()->user()->email,
            "contact" => auth()->user()->mobile_no,
            "type" => 'customer',
            "reference_id" => 'Contact Id '.rand(1111111,9999999),
        ]; 

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.razorpay.com/v1/contacts');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        curl_setopt($ch, CURLOPT_USERPWD, 'rzp_live_HglbfWetBA3Ylq' . ':' . '7pN0zxbjttSSKWeKVhUjpkCo');

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        $resultArr = json_decode($result);
       
        $contactId = $resultArr->id;
        
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

     
        // Add Account details 

        $accountData = [
            "contact_id" => $contactId,
            "account_type" => 'bank_account',
            "bank_account" => [
                "name" => auth()->user()->name,
                "ifsc" => $request->ifsc_code,
                "account_number" => $request->account_no,
            ],
        ]; 


        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.razorpay.com/v1/fund_accounts');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($accountData));
        curl_setopt($ch, CURLOPT_USERPWD, 'rzp_live_HglbfWetBA3Ylq' . ':' . '7pN0zxbjttSSKWeKVhUjpkCo');

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        $resultArr2 = json_decode($result);
     
        if(isset($resultArr2->error) && !empty($resultArr2->error)){
            return redirect('user/bank-details')->with('message', $resultArr2->error->description);
        }
        
        $fundId = $resultArr2->id;
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        // Verify account 

        //4564563975882261 live account
        //2323230030793119 test account
     
        // $postData = [
            
        //     "account_number" => "4564563975882261",
        //     "fund_account" => [
        //         'id' => $fundId
        //     ],
        //     "amount" => 100,
        //     "currency" => "INR"
        //     ]; 

        // $ch = curl_init();

        // curl_setopt($ch, CURLOPT_URL, 'https://api.razorpay.com/v1/fund_accounts/validations');
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        // curl_setopt($ch, CURLOPT_USERPWD, 'rzp_live_HglbfWetBA3Ylq' . ':' . '7pN0zxbjttSSKWeKVhUjpkCo');

        // $headers = array();
        // $headers[] = 'Content-Type: application/json';
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // $result = curl_exec($ch);
        // $statusArr =  json_decode($result); 
        
        // if(isset($statusArr->error) && !empty($statusArr->error)){
        //     return redirect('user/bank-details')->with('message', $statusArr->error->description);
        // }

        // if($statusArr->status == 'failed'){
        //     return redirect('user/bank-details')->with('message', 'Your Account details is wrong');
        // }
        // if (curl_errno($ch)) {
        //     echo 'Error:' . curl_error($ch);
        // }
        // curl_close($ch);
     
        $update = DB::table('bankdetails')->where('user_id', auth()->user()->id)
       ->update(['customer_id' => $contactId, 'fund_id' => $fundId, 'status' => 1]);
     
        }

        
        return redirect('user/bank-details')->with('message', 'Details Updated Successfully!');   
    }

    public function teamHelpingBonus(Request $request , $id){
        $userId = auth()->user()->id;
        $getDetails = DB::table('affiliate')->select('affiliate.id','affiliate.user_id','affiliate.package_id','affiliate.send_by','affiliate.amount','affiliate.parents', 'affiliate.status','affiliate.timestamp', 'packages.name as packageName','affiliate_comm.amount', 'users.name','users.referral_code', 'users.profile_pic', 'affiliate.timestamp')
        ->leftJoin('packages', 'affiliate.package_id', '=', 'packages.id')
        ->leftJoin('users', 'affiliate.send_by', '=', 'users.id')
        ->leftJoin('affiliate_comm', 'affiliate.id', '=', 'affiliate_comm.affiliate_id')
        //->whereRaw('FIND_IN_SET(?, affiliate.parents)', [$userId])
        ->where('affiliate_comm.user_id', $userId)
        ->where('affiliate_comm.comm_status', 2)
        ->where('affiliate.status', 1)->get();
        return view('user.funds.view', compact('getDetails'));
    }

    public function commission(Request $request , $id, $type){

        $lastSevendays = date('Y-m-d', strtotime('-7 days'));
        
        $previous =  date('Y-m-d');
        $previous = strtotime($previous);
        $previous = strtotime("midnight", $previous);
        $todaytimestamp = strtotime('today midnight'); 
        $timestamp = date('d-m-Y 11:59:00 A');
        $timestamp = strtotime($timestamp);
      

        $lastThirtydays = date('Y-m-d', strtotime('-30 days'));

        $userId = auth()->user()->id;
        $query = DB::table('affiliate')->select('affiliate.id','affiliate.user_id','affiliate.package_id','affiliate.send_by','affiliate.amount','affiliate.parents', 'affiliate.status','affiliate.timestamp', 'packages.name as packageName','affiliate_comm.amount', 'users.name','users.referral_code', 'users.profile_pic', 'affiliate.timestamp', 'affiliate_comm.comm_status')
        ->leftJoin('packages', 'affiliate.package_id', '=', 'packages.id')
        ->leftJoin('users', 'affiliate.user_id', '=', 'users.id')
        ->leftJoin('affiliate_comm', 'affiliate.id', '=', 'affiliate_comm.affiliate_id');
        if($type == 1 || $type == 2){
            $query->whereDate('affiliate.created_at', Carbon::today());
        }

        if($type == 4){
            $query->whereBetween('affiliate_comm.timestamp', [ strtotime($lastSevendays) , $previous]);
            //$query->whereDate('affiliate_comm.created_at', Carbon::now()->subDays(7));
        }

        if($type == 5){
            $query->whereBetween('affiliate_comm.timestamp', [ strtotime($lastThirtydays) , $previous]);
        }

        $query->where('affiliate_comm.user_id', $userId);
        if($id == 1){
            $query->whereIn('affiliate_comm.comm_status', [1,2]);    
        }
        $query->where('affiliate.status', 1);
        $query->where('affiliate_comm.amount','!=', 0);
        $getDetails = $query->get();

        $totalFunds = DB::table('affiliate_comm')->where('user_id', $userId)
        ->where('status', 1)->where('comm_status', 3)->sum('amount');

        $todayTeamHelpingBonus = DB::table('affiliate_comm')->where('user_id', $userId)
        ->whereIn('status', [1,2])
        ->where('timestamp', '>', $todaytimestamp)
        /*->whereDate('created_at', Carbon::today())*/
        ->where('comm_status', 2)->sum('amount');

        $todayEarning = DB::table('affiliate_comm')->where('user_id', $userId)
        ->where('timestamp', '>', $todaytimestamp)
        /*->whereDate('created_at', Carbon::today())*/
        ->whereIn('status', [1,2])
        ->where('comm_status', 1)->sum('amount');

        $todayPayout = DB::table('affiliate_comm')->where('user_id', $userId)
        ->where('affiliate_comm.status', 1)
        ->whereIn('comm_status', [1,2])->sum('amount');

        $teamHelpingBonus = DB::table('affiliate_comm')->where('user_id', $userId)
        ->whereIn('status', [1,2])
        ->where('comm_status', 2)->sum('amount');


        $lastSevenEarning = DB::table('affiliate_comm')
        ->where('user_id', $userId)
        ->whereBetween('timestamp', [ strtotime($lastSevendays) , $timestamp ])
        ->whereIn('comm_status', [1,2])
        /*->where('status', 1)*/
        ->sum('amount');

        $earningthisMonth = DB::table('affiliate_comm')->where('user_id', $userId)
        ->whereBetween('timestamp', [ strtotime($lastThirtydays) , $timestamp])
        ->whereIn('comm_status', [1,2])
        /*->where('status', 1)*/
        ->sum('amount');

        $alltime = DB::table('affiliate_comm')->where('user_id', $userId)
        /*->where('status', 1)*/
        ->whereIn('comm_status', [1,2])->sum('amount');
        $totalComm =  DB::table('affiliate_comm')->select(DB::raw('group_concat(amount) as amount'), )->where('user_id', $userId)->where('status', 1)->first();
        $maxValue = !empty($totalComm) ? max(explode(',',$totalComm->amount)) : 0;
        return view('user.funds.commission', compact('getDetails', 'type','maxValue','todayTeamHelpingBonus','teamHelpingBonus','todayEarning','totalFunds','lastSevenEarning','earningthisMonth','alltime', 'totalComm', 'todayPayout','userId'));
    }
    


    public function addBeneficiaryDetails($data){
       

        /****************
         * Live key : rzp_live_HglbfWetBA3Ylq
         * Like secert : 7pN0zxbjttSSKWeKVhUjpkCo
         * Test key : rzp_live_jwj1GZYYclqmWj
         * Test secret : T1bDVdsVr2sexdPHBxhhvxWO
         * **************/

        // Create Contact 

        $postData = [
            "name" => auth()->user()->name,
            "email" =>auth()->user()->email,
            "contact" => auth()->user()->mobile_no,
            "type" => 'customer',
            "reference_id" => 'Contact Id '.rand(1111111,9999999),
        ]; 

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.razorpay.com/v1/contacts');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        curl_setopt($ch, CURLOPT_USERPWD, 'rzp_live_jwj1GZYYclqmWj' . ':' . 'T1bDVdsVr2sexdPHBxhhvxWO');

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        $resultArr = json_decode($result);

        $contactId = $resultArr->id;
        
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);


        // Add Account details 

        $accountData = [
            "contact_id" => $contactId,
            "account_type" => 'bank_account',
            "bank_account" => [
                "name" => auth()->user()->name,
                "ifsc" => $data['ifsc_code'],
                "account_number" => $data['account_no'],
            ],
        ]; 


        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.razorpay.com/v1/fund_accounts');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($accountData));
        curl_setopt($ch, CURLOPT_USERPWD, 'rzp_live_jwj1GZYYclqmWj' . ':' . 'T1bDVdsVr2sexdPHBxhhvxWO');

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        $resultArr2 = json_decode($result);
        if(isset($resultArr2->error) && !empty($resultArr2->error)){
            return redirect('user/bank-details')->with('message', $resultArr2->error->description);
            exit();
        }
        
        $fundId = $resultArr2->id;
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        die();
       $update = DB::table('bankdetails')->where('user_id', auth()->user()->id)
       ->updateArr(['customer_id' => $contactId, 'fund_id' => $fundId]);
        // Verify account 

        //4564563975882261 live account
        //2323230030793119 test account
     
        // $postData = [
            
        //     "account_number" => "2323230030793119",
        //     "fund_account" => [
        //         'id' => "fa_KDh8JgoMmNVKPS"
        //     ],
        //     "amount" => 100,
        //     "currency" => "INR"
        //     ]; 

        // $ch = curl_init();

        // curl_setopt($ch, CURLOPT_URL, 'https://api.razorpay.com/v1/fund_accounts/validations');
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        // curl_setopt($ch, CURLOPT_USERPWD, 'rzp_live_jwj1GZYYclqmWj' . ':' . 'T1bDVdsVr2sexdPHBxhhvxWO');

        // $headers = array();
        // $headers[] = 'Content-Type: application/json';
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // $result = curl_exec($ch);

        // if (curl_errno($ch)) {
        //     echo 'Error:' . curl_error($ch);
        // }
        // curl_close($ch);

        // Create Payout

        $postData = [
            
            "account_number" => "2323230030793119",
            "fund_account_id" => "fa_KDh8JgoMmNVKPS",
            "amount" => 100,
            "currency" => "INR",
            "mode"=> "IMPS",
            "purpose"=> "payout",
            "queue_if_low_balance"=> true,
            "reference_id"=> 'Contact Id '.rand(1111111,9999999),
            "narration"=> "Acme Corp Fund Transfer",
        ]; 

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.razorpay.com/v1/payouts');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        curl_setopt($ch, CURLOPT_USERPWD, 'rzp_live_jwj1GZYYclqmWj' . ':' . 'T1bDVdsVr2sexdPHBxhhvxWO');

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);

        echo "<pre>"; print_r(json_decode($result)); die();
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        die();
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://payout-gamma.cashfree.com/payout/v1/authorize');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        
        $headers = array();
        $headers[] = 'Accept: application/json';
        $headers[] = 'X-Client-Id: CF197620CBKCQP1F0UP2UVDB41S0';
        $headers[] = 'X-Client-Secret: cdc3b98d4130d43f1892d7de995fe22afff98869';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        $result = curl_exec($ch);
        echo "<pre>"; print_r($result);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

die;
        $postData = [
            'beneId' => $this->encryptor('encrypt', auth()->user()->id),
            "name" => $data['name'],
            "email" =>$data['email'],
            "phone" => $data['phone'],
            "bankAccount" => $data['account_no'],
            "ifsc" => $data['ifsc_code'],
            "vpa" => "9713506147@ybl",
            "address1" => "80 B ShardaNagar",
            "address2" => "MR 10",
            "city" => "Indore",
            "state" => "MP",
            "pincode" => "486001"
        ];


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://payout-api.cashfree.com/payout/v1/addBeneficiary');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

        $headers = array();
        $headers[] = 'Accept: application/json';
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        echo "<pre>"; print_r($result); die;
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
    }

    public function startupVideo(Request $request){
        return view('user.training.startupVideo');
    }

}
