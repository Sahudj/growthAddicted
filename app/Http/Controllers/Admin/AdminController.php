<?php

namespace App\Http\Controllers\Admin;
use PHPMailer\PHPMailer\PHPMailer;  
use PHPMailer\PHPMailer\Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Affiliate;
use App\Models\Packages;
use App\Models\States;
use DB;
use Auth;
use Session;
use Mail;
use App;
use Illuminate\Support\Facades\Validator;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use DataTables;
class AdminController extends Controller
{

    public function __construct(){
        $this->middleware(['auth']); 
    }

    public function timeData(){
        date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)

        echo date('d-m-Y', 1666981800);
        echo "<br>";

        echo date('d-m-Y', 1667673000);

    }

    public function index(){
        date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
        $fromTimestamp = time();
        
        $lastSevendays = date('Y-m-d', strtotime('-8 days'));
        
        $previous =  date('Y-m-d');
        $previous = strtotime($previous);
        $previous = strtotime("midnight", $previous);
        $todaytimestamp = strtotime('today midnight'); 
        $lastThirtydays = date('Y-m-d', strtotime('-31 days'));


        $timestamp = date('d-m-Y 11:59:00 A');
        $timestamp = strtotime($timestamp);

        $todayEarning = DB::table('affiliate_comm')
        // ->whereDate('created_at', Carbon::today())
        ->where('timestamp', '>', $todaytimestamp)
        ->where('status', 1)->sum('company_amount');

        $todayRegister = DB::table('users')->where('order_status', 1)
        // ->whereDate('created_at', Carbon::today())
        ->where('timestamp', '>', $todaytimestamp)
        ->count();


        $lastSevenEarning = DB::table('affiliate_comm')
        ->whereBetween('timestamp', [ strtotime($lastSevendays) , $timestamp ])
        ->where('status', 1)->sum('company_amount');

        $earningthisMonth = DB::table('affiliate_comm')
        ->whereBetween('timestamp', [ strtotime($lastThirtydays) , $timestamp])
        ->where('status', 1)->sum('company_amount');

        $alltime = DB::table('affiliate_comm')->where('status', 1)->sum('company_amount');

        $todayPayout = DB::table('affiliate_comm')
        // ->whereDate('affiliate_comm.created_at', Carbon::today())
        ->where('affiliate_comm.timestamp', '>', $todaytimestamp)
        ->where('affiliate_comm.status', 1)
        ->whereIn('affiliate_comm.comm_status', [1,2])->sum('amount');

        $todayPayoutYesterday = DB::table('affiliate_comm')
        ->whereDate('affiliate_comm.created_at', Carbon::now()->subDays(1))
        ->whereIn('affiliate_comm.comm_status', [1,2])
        ->where('affiliate_comm.status', 1)
        ->sum('amount');
        $reqInfo = DB::table('user_account_request')->where('status', 0)->orderBy('id', 'desc')->count();
        $usersCount = User::where('role', '!=', 1)->where('order_status', 1)->count();
        $packagesCount = Packages::where('status', 1)->count();
        return view('admin.dashboard', compact('usersCount','todayRegister', 'packagesCount','todayEarning','lastSevenEarning','earningthisMonth','alltime', 'todayPayout', 'todayPayoutYesterday', 'reqInfo'));
    }    

    public function usersListing(Request $request){
         if ($request->ajax()) {
            $users = User::select('id', 'name','status','state','mobile_no','email', 'ref_by_user')
                    ->where('role', '!=', 1)->orderBy('id', 'desc');
            return Datatables::of($users)
                    // ->addIndexColumn()
                    ->addColumn('sponsor_name', function($row){
                        $sponsorName = "";
                        if($row->ref_by_user != ''){
                            $getSponsor = DB::table('users')->select('name')->where('id', $row->ref_by_user)->first();
                            $sponsorName = $getSponsor->name;
                        }
                        return $sponsorName;
                    })

                    ->addColumn('status', function($row){
                        if($row->status == 1){
                           $btn = '<span class="chip green lighten-5"><span class="green-text">Active</span></span>';
                        }else{
                            $btn = '<span class="chip red lighten-5"><span class="red-text">Inactive</span></span>';
                        }
                        return $btn;
                    })

                    ->addColumn('state', function($row){
                        $state = !empty($row->getState->state) ? $row->getState->state : "" ;
                        return $state;
                    })

                    ->addColumn('comm_status', function($row){
                        if($row->status == 1){
                           $btn = '<span class="chip green lighten-5"><span class="green-text">By Ref</span></span>';
                        }else{
                            $btn = '<span class="chip red lighten-5"><span class="red-text">Direct</span></span>';
                        }
                        return $btn;
                    })

                    ->addColumn('action', function($row){
                           $btn = '<a target="_blank" href="edit-user/'.$row->id.'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit"><i class="material-icons">edit</i></a>';
   
                           $btn = $btn.' <a target="_blank" href="view/'.$row->id.'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="View"><i class="material-icons">remove_red_eye</i></a>';
                            $btn = $btn.' <a href="javascript:void(0)" onclick="sendWelcomeMail('.$row->id.')" title="Send Welcome Email"><i class="material-icons">mail</i></a>';
    
                            return $btn;
                    })
                    ->rawColumns(['sponsor_name','status','state','action'])
                    ->make(true);
        }else{

            $users = User::where('role', '!=', 1)->orderBy('id', 'desc')->get();
            return view('admin.user.list', compact('users'));
        }

    } 

    public function addUserForm(){
        $states =  States::all();
        return view('admin.user.add', compact('states'));
    }

       public function saveUserDetails(Request $request){
      
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }



        $insert = User::Create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_pass' => $request->password,
            'role' => 1,
        ]);

        DB::table('permission')->insert([
            "user_id" =>!empty($insert->id) ? $insert->id : 0 ,
            "is_usersListing" =>!empty($request->usersListing) ? $request->usersListing : 0 ,
            "is_adminUserListing" =>!empty($request->adminUserListing) ? $request->adminUserListing : 0 ,
            "is_packages" =>!empty($request->packages) ? $request->packages : 0 ,
            "is_course" =>!empty($request->course) ? $request->course : 0 ,
            "is_traffic" =>!empty($request->traffic) ? $request->traffic : 0 ,
            "is_payouts" =>!empty($request->payouts) ? $request->payouts : 0 ,
            "is_leaderboard" =>!empty($request->leaderboard) ? $request->leaderboard : 0 ,
            "is_offers" =>!empty($request->offers) ? $request->offers : 0 ,
            "is_setting" =>!empty($request->setting) ? $request->setting : 0 ,
            "is_training" =>!empty($request->training) ? $request->training : 0 ,
            "is_emailTemplate" =>!empty($request->emailTemplate) ? $request->emailTemplate : 0 ,
            "is_account" =>!empty($request->account) ? $request->account : 0 ,
            "is_dashboard" =>!empty($request->is_dashboard) ? $request->is_dashboard : 0 ,
            "is_profile" =>!empty($request->is_profile) ? $request->is_profile : 0 ,
            "is_search" =>!empty($request->is_search) ? $request->is_search : 0 ,
            "is_bank_req" =>!empty($request->is_bank_req) ? $request->is_bank_req : 0 ,
        ]);

        if($insert){
            return redirect('admin/admin-listing')->with('message', 'User Registered Successfully!');
        }

    }

    public function editUser($id){
        $states =  States::all();
        $getDetails = User::find($id);
        $packages = DB::table('packages')->select('id', 'name')->get();
        $document = DB::table('bankdetails')->where('user_id', $id)->select('document1', 'document2')->first();
        return view('admin.user.edit', compact('getDetails', 'states', 'packages', 'document'));
    }

    public function updateUserDetails(Request $request){

        $id = $request->userId;
        $user = User::find($id);
        
        $validator = Validator::make($request->all(), [
             'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users,email,'.$user->id.',id'],
            'phone'=> ['required', 'min:10'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $updateArr = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mobile_no' => $request->phone,
            'state' => $request->state,
            'user_pass' => $request->password,
            'role' => 2,
            'status' => $request->status,
            'enable_third_tier' => $request->enable_third_tier,
            'enable_team_helping' => $request->enable_team_helping,
            'show_only_courses' => $request->show_only_courses,
            'is_show_leaderboard' => $request->is_show_leaderboard,
            'sponsor_comm' => !empty($request->sponsor_amount) ? $request->sponsor_amount : 0
        ];

        

        if($request->enable_account == 1){
            $updateArr['enable_account'] = $request->enable_account;
            $updateArr['order_status'] = 1;
            $updateArr['package_id'] = $request->addPackage;
            if(isset($request->sponsor_amount) && !empty($request->sponsor_amount)){

            $insertArr = [
                'customerName' => $user->name, 
                'customerPhone' => $user->mobile_no, 
                'customerEmail' => $user->email , 
                'amount' => $request->sponsor_amount, 
                'user_id' => $user->id, 
                'package_id' => $request->addPackage, 
                'ref_by' => !empty($user->ref_by_user) ? $user->ref_by_user : $user->id, 
                'paymentMode' => 'Direct', 
                'from_package' => $user->package_id, 
                'to_package_id' => $request->addPackage, 
                'direct_income' => $request->sponsor_amount, 
            ];

           
            $order = DB::table('orders')->insertGetId($insertArr);

            $insertAffArr = [
                'user_id' => $user->id,
                'package_id' => $request->addPackage,
                'send_by' => !empty($user->user->ref_by_user) ? $user->user->ref_by_user : $user->id,
                'amount' => $request->sponsor_amount,
                'order_id' => $order,
                'status' => 2,
            ];
            
            $affiliate = DB::table('affiliate')->insertGetId($insertAffArr);

            $insertAffCommArr = [
                'affiliate_id' => $affiliate,
                'user_id' => $user->ref_by_user,
                'amount' => $request->sponsor_amount,
                'owner_amount' => 0,
                'company_amount' => 0,
                'comm_status' => 1,
                'status' => 1,
                'timestamp' => time()
            ];

            $insertComm = DB::table('affiliate_comm')->insertGetId($insertAffCommArr);

            }

        }

        if($request->enableDisable == 1){
            $updateArr['enable_account'] = $request->enable_account;
            $updateArr['order_status'] = 0;
            $updateArr['package_id'] = null;
        }

        $update = User::find($id)->update($updateArr); 

        if($update){
            return redirect('admin/edit-user/'.$id)->with('message', 'User Details Updated Successfully!');
        }
    }
   
    public function activityLog(){
        $activityLog = activity::paginate(10);
        $users = User::select('id', 'name')->get();
        $mobileuser = Customer::select('id', 'username')->get();
        return view('admin.activity', compact('activityLog', 'users', 'mobileuser'));
    }
    
    public function updateProfile(){
        $id = Auth()->user()->id;
        $getDetails = User::find($id);
        $states =  States::all();
        return view('admin.editProfile', compact('getDetails', 'states'));   
    }
    
    public function updateData(Request $request){

        $id = Auth()->user()->id;

        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users,email,'.$id.',id'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
       
        $username = !empty($request->username) ? $request->username : '';
        $email = !empty($request->email) ? $request->email : '' ;
        $password = !empty($request->password) ? $request->password : '' ;
        $state = !empty($request->state) ? $request->state : '';
        $phone = !empty($request->phone) ? $request->phone : '' ;
        $updateArr = [
            'username' => $username,
            'email' => $email,
            'mobile_num' => $phone,
            'state' => $state,
            'mobile_no' => $phone,
        ]; 

        if(!empty($password)){
            $updateArr['password'] = Hash::make($password);
        }
        $update = User::find($id)->update($updateArr);
        if($update){
           return redirect('admin/profile')->with('message', 'Details Updated Successfully!');   
        }
    }

    public function deleteUser($id){
        $delete = User:: findOrFail($id)->delete($id);
        if($delete){
           return redirect('admin/user-listing')->with('message', 'User Deleted Successfully!');   
        }
    }

    /*********************************   Training  **********************************/

            public function addTrainingForm(Request $request){
                return view('admin.training.add');
            }

            public function trainingListing(Request $request){
                $training = DB::table('training')->get();
                return view('admin.training.list' , compact('training'));
            }

            public function saveTrainingDetails(Request $request){
                $validator = Validator::make($request->all(), [
                    'youtubeLink' => ['required'],
                    'thumbnail' => ['required'],
                ]);
        
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
    
                if (! File::exists(public_path('training/'))) {
                    File::makeDirectory(public_path('training/'), 0775, true);
                }
                $trainingImage = '';
                
                if ($files = $request->file('thumbnail')) {
                    $trainingImage = $files->getClientOriginalExtension();
                    $trainingImage = 'training'.time().'.'.$trainingImage; 
                    $files->move(public_path().'/training/', $trainingImage);
                }
    
                $insert = DB::table('training')->insert(
    
                    [
                        'youtubeLink' => $request->youtubeLink,
                        'thumbnail' => $trainingImage,
                        'timestamp' => time(),
                    ]);
                
                return redirect('admin/training-listing')->with('message', 'training Details Added Successfully!');  
            }

            public function editTrainingForm (Request $request , $id){
                $getDetails = DB::table('training')->where('id', $id)->first();
                return view('admin.training.edit', compact('getDetails'));
            }
    
            public function updateTrainingDetails(Request $request){
                $id = $request->id;
                $validator = Validator::make($request->all(), [
                    'youtubeLink' => ['required'],
                ]);
        
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
    
                if (! File::exists(public_path('offer/'))) {
                    File::makeDirectory(public_path('offer/'), 0775, true);
                }
    
                $offerImage = !empty($request->hiddenThumbnail) ? $request->hiddenThumbnail : '';
                
                if ($files = $request->file('thumbnail')) {
                    $offerImage = $files->getClientOriginalExtension();
                    $offerImage = 'offer'.time().'.'.$offerImage; 
                    $files->move(public_path().'/offer/', $offerImage);
                }
    
                $insert = DB::table('training')->where('id', $id)->update(
    
                    [
                        'youTubeLink' => $request->youtubeLink,
                        'thumbnail' => $offerImage,
                        'status' => $request->status
                    ]);
                
                    return redirect('admin/training-listing')->with('message', 'Training details has been updated successfully!');   
            }

            public function destoryTraining(Request $request, $id){
                $delete = DB::table('training')->where('id', $id)->delete();
                if($delete){
                    return redirect('admin/training-listing')->with('message', 'Training has been deleted successfully!');  
                }
            }

/*********************************   Webinar  **********************************/

        public function addWebinarForm(Request $request){
            return view('admin.webinar.add');
        }

        public function webinarListing(Request $request){
            $listing = DB::table('webinar')->get();
            return view('admin.webinar.list', compact('listing'));
        }

        public function saveWebinarDetails(Request $request){
            if (! File::exists(public_path('/webinar/thumbnail/'))) {
                File::makeDirectory(public_path('/webinar/thumbnail/'), 0775, true);
            }

            $thumbnail = '';
            
            if ($files = $request->file('thumbnail')) {
                $thumbnail = $files->getClientOriginalExtension();
                $thumbnail = 'thumbnail'.time().'.'.$thumbnail; 
                $files->move(public_path().'/webinar/thumbnail/', $thumbnail);
            }


            $insert = DB::table('webinar')->insert(

                [
                    'topic' => $request->topic,
                    'webinar_date' => $request->webinar_date,
                    'webinar_time' =>$request->webinar_time,
                    'trainer' => $request->trainer,
                    'meeting_id' => $request->meeting_id,
                    'password' =>$request->password,
                    'thumbnail' => $thumbnail,
                    'meeting_url' => $request->meeting_url
                ]);
            
            return redirect('admin/webinar-listing')->with('message', 'Webinar Details Added Successfully!');
        }

        public function editWebinarForm(Request $request, $id){
            $getDetails = DB::table('webinar')->where('id', $id)->first();
            return view('admin.webinar.edit', compact('getDetails'));
        }

        public function updateWebinarDetails(Request $request){
            $id = $request->id;

            if (! File::exists(public_path('/webinar/thumbnail/'))) {
                File::makeDirectory(public_path('/webinar/thumbnail/'), 0775, true);
            }

            $thumbnail = !empty($request->hiddenThumbnail) ? $request->hiddenThumbnail : '';
            
            if ($files = $request->file('thumbnail')) {
                $thumbnail = $files->getClientOriginalExtension();
                $thumbnail = 'thumbnail'.time().'.'.$thumbnail; 
                $files->move(public_path().'/webinar/thumbnail/', $thumbnail);
            }

            $update = DB::table('webinar')->where('id', $id)->update(

                [
                    'topic' => $request->topic,
                    'webinar_date' => $request->webinar_date,
                    'webinar_time' =>$request->webinar_time,
                    'trainer' => $request->trainer,
                    'meeting_id' => $request->meeting_id,
                    'password' =>$request->password,
                    'thumbnail' => $thumbnail,
                    'meeting_url' => $request->meeting_url
                ]);
            
            return redirect('admin/webinar-listing')->with('message', 'Webinar Details Added Successfully!'); 
        }

      

        public function destoryWebinar(Request $request, $id){
            $delete = DB::table('webinar')->where('id', $id)->delete();
            if($delete){
                return redirect('admin/webinar-listing')->with('message', 'Webinar has been deleted successfully!');  
            }
        }
    
        /*********************************   Session  **********************************/

        public function addSessionForm(Request $request){
            return view('admin.sessions.add');
        }

        public function sessionListing(Request $request){
            $sessionsListing = DB::table('q_a_session')->get();
            return view('admin.sessions.list', compact('sessionsListing'));
        }

        public function saveSessionDetails(Request $request){
            $validator = Validator::make($request->all(), [
                'youtubeLink' => ['required'],
                'thumbnail' => ['required'],
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            if (! File::exists(public_path('QAsession/'))) {
                File::makeDirectory(public_path('QAsession/'), 0775, true);
            }
            $sessionImage = '';
            
            if ($files = $request->file('thumbnail')) {
                $sessionImage = $files->getClientOriginalExtension();
                $sessionImage = 'session'.time().'.'.$sessionImage; 
                $files->move(public_path().'/QAsession/', $sessionImage);
            }

            $insert = DB::table('q_a_session')->insert(

                [
                    'youtubeLink' => $request->youtubeLink,
                    'thumbnail' => $sessionImage,
                ]);
            
            return redirect('admin/session-listing')->with('message', 'Session Details Added Successfully!'); 
        }

        public function editSessionForm (Request $request , $id){
            $getDetails = DB::table('q_a_session')->where('id', $id)->first();
            return view('admin.sessions.edit', compact('getDetails'));
        }

        public function updateSessionDetails(Request $request){
            $id = $request->id;
            $validator = Validator::make($request->all(), [
                'youtubeLink' => ['required'],
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            if (! File::exists(public_path('QAsession/'))) {
                File::makeDirectory(public_path('QAsession/'), 0775, true);
            }

            $sessionImage = !empty($request->hiddenThumbnail) ? $request->hiddenThumbnail : '';
            
            if ($files = $request->file('thumbnail')) {
                $sessionImage = $files->getClientOriginalExtension();
                $sessionImage = 'offer'.time().'.'.$sessionImage; 
                $files->move(public_path().'/QAsession/', $sessionImage);
            }

            $insert = DB::table('q_a_session')->where('id', $id)->update(

                [
                    'youtubeLink' => $request->youtubeLink,
                    'thumbnail' => $sessionImage,
                    'status' => $request->status
                ]);
            
            return redirect('admin/session-listing')->with('message', 'Offer has been updated successfully!');   
        }

        public function destorySession(Request $request, $id){
            $delete = DB::table('q_a_session')->where('id', $id)->delete();
            if($delete){
                return redirect('admin/session-listing')->with('message', 'Session has been deleted successfully!');  
            }
        }

    /*********************************  Offers  **********************************/

        public function addOfferForm(Request $request){
            return view('admin.offer.add');
        }

        public function offerListing(Request $request){
            $offers = DB::table('offers')->where('type', 0)->get();
            return view('admin.offer.list', compact('offers'));
        }

        public function saveOfferDetails(Request $request){

            $validator = Validator::make($request->all(), [
                'youtubeLink' => ['required'],
                'thumbnail' => ['required'],
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            if (! File::exists(public_path('offer/'))) {
                File::makeDirectory(public_path('offer/'), 0775, true);
            }
            $offerImage = '';
            
            if ($files = $request->file('thumbnail')) {
                $offerImage = $files->getClientOriginalExtension();
                $offerImage = 'offer'.time().'.'.$offerImage; 
                $files->move(public_path().'/offer/', $offerImage);
            }

            $insert = DB::table('offers')->insert(

                [
                    'youtubeLink' => $request->youtubeLink,
                    'thumbnail' => $offerImage,
                ]);
            
            return redirect('admin/all-offers')->with('message', 'Offer Details Added Successfully!');   
            
        }

        public function editOfferForm (Request $request , $id){
            $getDetails = DB::table('offers')->where('id', $id)->first();
            return view('admin.offer.edit', compact('getDetails'));
        }

        public function updateOfferDetails(Request $request){
            $id = $request->id;
            $validator = Validator::make($request->all(), [
                'youtubeLink' => ['required'],
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            if (! File::exists(public_path('offer/'))) {
                File::makeDirectory(public_path('offer/'), 0775, true);
            }

            $offerImage = !empty($request->hiddenThumbnail) ? $request->hiddenThumbnail : '';
            
            if ($files = $request->file('thumbnail')) {
                $offerImage = $files->getClientOriginalExtension();
                $offerImage = 'offer'.time().'.'.$offerImage; 
                $files->move(public_path().'/offer/', $offerImage);
            }

            $insert = DB::table('offers')->where('id', $id)->update(

                [
                    'youtubeLink' => $request->youtubeLink,
                    'thumbnail' => $offerImage,
                    'status' => $request->status
                ]);
            
                return redirect('admin/all-offers')->with('message', 'Offer has been updated successfully!');   
        }

        public function destoryOffer(Request $request, $id){
            $delete = DB::table('offers')->where('id', $id)->delete();
            if($delete){
                return redirect('admin/all-offers')->with('message', 'Offer has been deleted successfully!');  
            }
        }

        public function viewDetails(Request $request, $id ){
            $getDetails = User::find($id);
            $fromTimestamp = time();

            $lastSevendays = date('Y-m-d', strtotime('-7 days'));
            
            $previous =  date('Y-m-d');
            $previous = strtotime($previous);
            $previous = strtotime("midnight", $previous);
            $todaytimestamp = strtotime('today midnight'); 
            $lastThirtydays = date('Y-m-d', strtotime('-30 days'));

            $teamCount =   DB::table('affiliate')
            ->whereRaw('FIND_IN_SET(?, total_parents)', [$id])->orderBy('id', 'desc')->first();
            
            $teamCountArr = !empty($teamCount->total_parents) ?  explode(',', $teamCount->total_parents) : 0 ; 

            $todayEarning = DB::table('affiliate_comm')->where('user_id', $id)
            ->where('timestamp', '>', $todaytimestamp)
            /*->whereDate('created_at', Carbon::today())*/
            ->whereIn('status', [1,2])
            ->where('comm_status', 1)->sum('amount');

            $totalFunds = DB::table('affiliate_comm')->where('user_id', $id)
            ->where('status', 1)->where('comm_status', 3)->sum('amount');

           $teamHelpingBonus = DB::table('affiliate_comm')->where('user_id', $id)
            ->whereIn('status', [1,2])
            ->where('comm_status', 2)->sum('amount');
    
            $lastSevenEarning = DB::table('affiliate_comm')
            ->where('user_id', $id)
            ->whereBetween('timestamp', [ strtotime($lastSevendays) , $previous ])
            ->whereIn('comm_status', [1,2])
            /*->where('status', 1)*/
            ->sum('amount');
    
            $earningthisMonth = DB::table('affiliate_comm')->where('user_id', $id)
            ->whereBetween('timestamp', [ strtotime($lastThirtydays) , $previous])
            ->whereIn('comm_status', [1,2])
            /*->where('status', 1)*/
            ->sum('amount');

            $todayPayout = DB::table('affiliate_comm')->where('user_id', $id)
            ->where('affiliate_comm.status', 1)
            ->whereIn('comm_status', [1,2])->sum('amount');

            $totalDirectFund = '0';

            $getAffiliateIds = DB::table('affiliate')
            ->select(DB::raw("group_concat(affiliate.id) as affiliateId"))
            ->groupBy('affiliate.send_by')
            ->where('send_by', $id)->first();

            if(isset($getAffiliateIds) && !empty($getAffiliateIds)){
                $sql = "SELECT sum(`amount`) as totalAmount from `affiliate_comm` where `user_id` = $id and `affiliate_id` in ($getAffiliateIds->affiliateId) and `comm_status` = 1";
                $totalDirectFund = DB::select($sql);
                $totalDirectFund = !empty($totalDirectFund) ? $totalDirectFund[0]->totalAmount  : "0";
            }
    
            $alltime = DB::table('affiliate_comm')->where('user_id', $id)->whereIn('comm_status', [1,2])->sum('amount');
            $totalComm =  DB::table('affiliate_comm')->select(DB::raw('group_concat(amount) as amount'))->where('user_id', $id)->where('status', 1)->first();
            $maxValue = !empty($totalComm) ? max(explode(',',$totalComm->amount)) : 0;
            return view('admin.user.view', compact('getDetails','totalFunds', 'teamHelpingBonus' ,'maxValue','todayEarning','lastSevenEarning','earningthisMonth','alltime', 'totalComm', 'todayPayout' ,'teamCountArr', 'totalDirectFund'));
        }

        public function teamHelpingBonus(Request $request , $id){
            $packages = Packages::select(DB::raw( 'group_concat(QUOTE(name)) as "name" '))->first();
            $allpackages = Packages::select('id', 'name')->get();
            $userId = $id;

            $result = DB::table('affiliate')->select('send_by')->where('user_id', $id)->first();
            $teamCount =   DB::table('affiliate')->select('user_id')
            ->whereRaw('FIND_IN_SET(?, parents)', [$id])->get();
            
            $teamArr = '';

            if(isset($teamCount) && !empty($teamCount)){
                foreach ($teamCount as $row) {
                    $teamArr.=$row->user_id.',';                   
                }
            }

            $teamArr = rtrim($teamArr, ',');    
            $tmpArr =  explode(',', $teamArr); 
            $teamCountArr = array_unique($tmpArr);


            $teamCount =   DB::table('affiliate')
            ->whereRaw('FIND_IN_SET(?, total_parents)', [$id])->orderBy('id', 'desc')->first();
            
            $teamCountRes = !empty($teamCount->total_parents) ?  explode(',', $teamCount->total_parents) : [] ; 


            $query = DB::table('users')->select('id', 'name', 'profile_pic')
            ->whereNotIn('id', $teamCountArr)
            ->where('status', 1)
            ->where('role', 2)
            ->where('id', '!=', $id);
            if(isset($result->send_by) && !empty($result->send_by)){
                $query->where('id', '!=',$result->send_by);
            }
            $usersListing = $query->get();

            $getDetails = DB::table('affiliate')
            ->select('affiliate.id','affiliate.user_id','affiliate.package_id','affiliate.send_by','affiliate.amount','affiliate.parents', 'affiliate.status','affiliate.timestamp', 'packages.name as packageName', 'users.name','users.id as userId')
            ->leftJoin('packages', 'affiliate.package_id', '=', 'packages.id')
            ->leftJoin('users', 'affiliate.send_by', '=', 'users.id')
            ->leftJoin('affiliate_comm', 'affiliate.id', '=', 'affiliate_comm.affiliate_id')
            ->whereRaw('FIND_IN_SET(?, affiliate.parents)', [$userId])
            ->where('affiliate_comm.comm_status', 2)
            ->where('affiliate.status', 1)->get();
            return view('admin.bonus.team-helping', compact('getDetails', 'packages','userId','allpackages', 'teamCountArr', 'usersListing','teamCountRes'));
        }

        public function shiftTeam(Request $request){

            $user = $request->user;
            $members = json_decode($request->usersId);
            $currentUser = $request->currentUser;
            
            $update = DB::table('users')->where('id', $currentUser)->update(['ref_by_user' => $user]);
            
            $getDetails = DB::table('affiliate')->where('user_id', $user)->first();
            $result = DB::table('affiliate')->select('send_by', 'total_parents')->where('user_id', $currentUser)->first();

            $tempIds = explode(',', $getDetails->parents);
            
            if(count($tempIds) == 3){
                array_pop($tempIds);
                array_unshift($tempIds,$user);
            }else{
                array_unshift($tempIds,$user);
            }
            
            $newSponsor = !empty($tempIds) ?  implode(', ', $tempIds) : [];
          
            $totalSponsor =  str_replace($getDetails->send_by, $user, $getDetails->total_parents);

            $totalSponsor = !empty($getDetails->total_parents) ? $currentUser.','.$getDetails->total_parents : $currentUser;
            $updateArr = ['parents' => $newSponsor, 'total_parents' => $totalSponsor];
            $update = DB::table('affiliate')->where('user_id', $currentUser)->update($updateArr);

            $getData = DB::table('affiliate')->whereIn('user_id', $members)->get();
            if(isset($getData) && !empty($getData)){
                foreach ($getData as $row) {
                    $tempIds2 = explode(',', $row->parents);
                       if(count($tempIds2) == 3){
                            array_pop($tempIds2);
                            array_push($tempIds2,$user);
                        }else{
                            array_push($tempIds2,$user);
                        }

                    $newSponsor = !empty($tempIds2) ?  implode(', ', $tempIds2) : [];
                    $totalSponsor =  str_replace($result->send_by, $getDetails->user_id, $result->total_parents.','.$row->user_id);
                    $updateArr = ['user_id' => $row->user_id, 'parents' => $newSponsor, 'total_parents' => $totalSponsor];
                   $update = DB::table('affiliate')->where('id', $row->id)->update($updateArr);
                }
            }
            return redirect('admin/team-helping-bonus/'.$currentUser)->with('message', 'Sponsor shifted successfully!');  
        }


    public function traffic(Request $request){
            $id = auth()->user()->id;
           if ($request->ajax()) {
            $data = DB::table('orders')
                ->select('orders.id as orderId','users.id','customerName', 'orders.amount',
                'packages.name as packageName','packages.direct', 'orders.ref_by','customerEmail', 'customerPhone', 'users.created_at', 'users.profile_pic')
                ->leftJoin('users', 'orders.user_id', '=', 'users.id')
                ->leftJoin('packages', 'orders.package_id', '=', 'packages.id')
                ->whereNotNull('referenceId');

                // Custom multiple search
                $searchFields = ['fromDate', 'toDate', 'name', 'email', 'packages'];
                foreach ($searchFields as $field) {
                    if (isset($request->$field) && !empty($request->$field)) {
                        if ($field == 'fromDate') {
                            $data->where('orders.timestamp', '>=', strtotime($request->fromDate));
                        } elseif ($field == 'toDate') {
                            $data->where('orders.timestamp', '<=', strtotime($request->toDate));
                        } elseif ($field == 'name') {
                            $data->where('orders.customerName', 'like', '%' . $request->name . '%');
                        } elseif ($field == 'email') {
                            $data->where('orders.customerEmail', '=', $request->email);
                        } elseif ($field == 'packages') {
                            $data->where('orders.package_id', '=', $request->packages);
                        }
                    }
                }

            $data->addSelect(['sponsorName' => User::select('name')
                ->whereColumn('orders.ref_by', 'users.id')
                ->whereNotNull('orders.ref_by')
                ->limit(1)]);

            $data->orderBy('orders.id', 'desc');
            $paidLeads = $data->groupBy('users.id');

            return Datatables::of($paidLeads)
               
                ->addColumn('profilePic', function($row){
                    $image = "<img src='".env('APP_URL')."/public/profile_pic/".$row->profile_pic."' width='40px' height='40px' class='circle'/>";
                    return $image;
                })
                ->addColumn('sponsorName', function($row){
                    return $row->sponsorName;
                })
                ->addColumn('packageName', function($row){
                    return $row->packageName;
                })
                ->addColumn('createdAt', function($row){
                    return $row->created_at;
                })
                ->addColumn('action', function($row){
                    $btn ='<a href="/admin/affiliate-traffic-details/'.$row->orderId.'" data-toggle="tooltip"  data-id="'.$row->orderId.'" data-original-title="View"><i class="material-icons">remove_red_eye</i></a>';

                    return $btn;
                })
                ->rawColumns(['profilePic','sponsorName','packageName','createdAt','action'])
                ->make(true);
            }

                $packages = DB::table('packages')->get();
                return view("admin.traffic.traffic", compact('packages'));

    }


    public function unPaidTraffic(Request $request){

        $id = auth()->user()->id;

            if ($request->ajax()) {

                $data = DB::table('orders')->select('orders.id as orderId','users.id','users.name', 'orders.amount', 
                'packages.name as packageName','packages.direct', 'orders.ref_by', 'users.email', 'users.mobile_no', 'users.created_at' , 'users.profile_pic')
                ->leftJoin('users', 'orders.user_id', '=', 'users.id')
                ->leftJoin('packages', 'orders.package_id', '=', 'packages.id')
                ->whereNull('referenceId');
                $searchFields = ['fromDate', 'toDate', 'name', 'email', 'packages'];
                foreach ($searchFields as $field) {
                    if (isset($request->$field) && !empty($request->$field)) {
                        if ($field == 'fromDate') {
                            $data->where('orders.timestamp', '>=', strtotime($request->fromDate));
                        } elseif ($field == 'toDate') {
                            $data->where('orders.timestamp', '<=', strtotime($request->toDate));
                        } elseif ($field == 'name') {
                            $data->where('orders.customerName', 'like', '%' . $request->name . '%');
                        } elseif ($field == 'email') {
                            $data->where('orders.customerEmail', '=', $request->email);
                        } elseif ($field == 'packages') {
                            $data->where('orders.package_id', '=', $request->packages);
                        }
                    }
                }

            $data->orderBy('orders.id', 'desc');
            $unpaidLeads = $data->groupBy('users.id');   

            return Datatables::of($unpaidLeads)
                    
                ->addColumn('profilePic', function($row){
                    $image = "<img src='".env('APP_URL')."/public/profile_pic/".$row->profile_pic."' width='40px' height='40px' class='circle'/>";
                    return $image;
                })

                ->addColumn('packageName', function($row){
                    return $row->packageName;
                })

                ->addColumn('createdAt', function($row){
                    return $row->created_at;
                })

                ->addColumn('action', function($row){
                       $btn ='<a href="admin/affiliate-traffic-details/'.$row->orderId.'" data-toggle="tooltip"  data-id="'.$row->orderId.'" data-original-title="View"><i class="material-icons">remove_red_eye</i></a>';

                        return $btn;
                })
                ->rawColumns(['profilePic','packageName','createdAt','action'])
                ->make(true);
        }

        $packages = DB::table('packages')->get();
        return view("admin.traffic.unpaid", compact('packages'));
    }

    public function trafficDetails(Request $request , $id){
        $query = DB::table('orders')->select('orders.id as orderId','users.id','users.name', 'orders.amount',
        'packages.name as packageName','packages.direct', 'orders.ref_by','packages.image as thumbnail', 'users.email', 'users.mobile_no', 'users.created_at')
            ->leftJoin('users', 'orders.user_id', '=', 'users.id')
            ->leftJoin('packages', 'orders.package_id', '=', 'packages.id')
            ->where('orders.id', $id);
        
        $query->addSelect(['sponsorName' => User::select('name')
        ->whereColumn('orders.ref_by', 'users.id')
        ->whereNotNull('orders.ref_by')
        ->limit(1)]);

        $getDetails = $query->first();     
        return view('admin.traffic.view', compact('getDetails'));
    }    

    public function setting(Request $request){
        return view('admin.setting.add');
    }

    public function settingListing(Request $request){
        $settings = DB::table('setting')->get();
        return view('admin.setting.list', compact('settings'));
    }

    public function saveSetting(Request $request){

        if(count($request->meta_key) > 0){
            $getlength = count($request->meta_key);
            for($i = 0; $i < $getlength; $i++){
                DB::table('setting')->insert([
                    'meta_key' => $request->meta_key[$i],
                    'meta_value'=>  $request->meta_value[$i],
                ]);
            }
        }
        return redirect('admin/setting')->with('message', 'Details Saved Successfully!');
    }


    public function editSetting($id)
    {
        $getDetails = DB::table('setting')->where('id', $id)->first();
        return view('admin.setting.edit', compact('getDetails'));
    }

    public function updateSetting(Request $request){
        $id = $request->id;
        DB::table('setting')->where('id', $id)->update([
            'meta_key' => $request->meta_key,
            'meta_value'=>  $request->meta_value,
        ]);
        return redirect('admin/setting')->with('message', 'Details Updated Successfully!');
    }

    public function affiliatePayout(Request $request, $type){
        
        $query = DB::table('affiliate_comm')
        ->select('users.id','affiliate_comm.status','users.name','bankdetails.customer_id', 'bankdetails.fund_id','users.email','users.mobile_no', DB::raw('SUM(affiliate_comm.amount) AS amount'))
        ->leftJoin('users', 'affiliate_comm.user_id', '=', 'users.id') 
        ->leftJoin('affiliate', 'affiliate_comm.affiliate_id', '=', 'affiliate.id')
        ->leftJoin('bankdetails', 'users.id', '=', 'bankdetails.user_id');
        if($type == 1){
            // $query->whereDate('affiliate_comm.created_at', Carbon::today());
            $query->where('affiliate_comm.status', 1)    ;
        }else{
            $query->whereDate('affiliate_comm.created_at', Carbon::now()->subDays(1));
            $query->where('affiliate_comm.status', 2);
        }
        $query->where('users.name', '!=', '');
        $query->whereIn('affiliate_comm.comm_status', [1,2]);
        $query->whereNotNull('affiliate.order_id');
        $query->groupBy('affiliate_comm.user_id');
        $payouts = $query->get();
        $permission = DB::table('permission')->where('user_id', auth()->user()->id)->first();
        return view('admin.traffic.payout', compact('payouts', 'type', 'permission'));
    }

    public function viewPayoutDetails(Request $request, $userid){
        $lastSevendays = date('Y-m-d', strtotime('-7 days'));
        
        $previous =  date('Y-m-d');
        $previous = strtotime($previous);
        $previous = strtotime("midnight", $previous);
      

        $lastThirtydays = date('Y-m-d', strtotime('-30 days'));

        $userId = $userid;
        $query = DB::table('affiliate')->select('affiliate.order_id','affiliate.id','affiliate.user_id','affiliate.package_id','affiliate.send_by','affiliate.amount','affiliate.parents', 'affiliate.status','affiliate.timestamp', 'packages.name as packageName','affiliate_comm.amount', 'users.name','users.referral_code', 'users.profile_pic', 'affiliate.timestamp', 'affiliate_comm.comm_status')
        ->leftJoin('packages', 'affiliate.package_id', '=', 'packages.id')
        ->leftJoin('users', 'affiliate.user_id', '=', 'users.id')
        ->leftJoin('affiliate_comm', 'affiliate.id', '=', 'affiliate_comm.affiliate_id');
        $query->where('affiliate_comm.user_id', $userId);
        $query->whereIn('affiliate_comm.comm_status', [1,2]);    
        $query->where('affiliate_comm.status', 1);
        $query->whereNotNull('affiliate.order_id');
        $getDetails = $query->get();
        
        return view('admin.traffic.commission', compact('getDetails'));
    }

    public function deletePayoutDetails(Request $request, $affiliateId){
        $delete1 =  DB::table('affiliate')->where('id', $affiliateId)->limit(1)->delete();
        $delete = DB::table('affiliate_comm')->where('affiliate_id', $affiliateId)->delete();
        if($delete){
             return redirect('admin/payouts/1')->with('message', 'Payout deleted Successfully!');
        }

    }

    public function editPayoutDetails(Request $request , $affiliateId){
        $getDetails = DB::table('affiliate_comm')
        ->select('affiliate_comm.id', 'affiliate_comm.id','affiliate_comm.affiliate_id','affiliate_comm.user_id','affiliate_comm.amount', 'affiliate_comm.owner_amount','affiliate_comm.company_amount','affiliate_comm.timestamp','affiliate_comm.status','affiliate_comm.comm_status','users.name')
        ->leftJoin('users', 'affiliate_comm.user_id', '=', 'users.id')
        ->where('affiliate_id', $affiliateId)->get();
        return view('admin.traffic.editPayout', compact('getDetails'));
    }

    public function updatePayoutDetails(Request $request){
        if(count($request->affiliateCommId) > 0){
            $getlength = count($request->affiliateCommId);
            for($i = 0; $i < $getlength; $i++){
                DB::table('affiliate_comm')
                ->where('id', $request->affiliateCommId[$i])
                ->where('user_id', $request->userId[$i])
                ->update([
                    'amount' => $request->amount[$i],
                    'company_amount'=>  $request->company_amount[$i],
                ]);
            }
        }
        return redirect('admin/edit-payout/'.$request->affiliateId)->with('message', 'Details Saved Successfully!');

    }

    public function sendPayout(Request $request , $id, $amount){
        
        $getDetails = DB::table('bankdetails')->select('customer_id','bankdetails.account_no', 'fund_id', 'users.name','users.email')
        ->leftJoin('users', 'bankdetails.user_id', '=', 'users.id')
        ->where('bankdetails.user_id', $id)->first();
      
        $postData = [
            
            "account_number" => "4564563975882261",
            "fund_account_id" => $getDetails->fund_id,
            "amount" => $amount.'00',
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
        curl_setopt($ch, CURLOPT_USERPWD, 'rzp_live_HglbfWetBA3Ylq' . ':' . '7pN0zxbjttSSKWeKVhUjpkCo');

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);

        $resutArr = json_decode($result);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
      
        if($resutArr->status == "processing"){

            $updateArr = ['status' => 2, 'payout_timestamp' => time()];
            $update = DB::table('affiliate_comm')
                ->where('affiliate_comm.user_id', $id)
                /*->whereDate('affiliate_comm.created_at', Carbon::today())*/
                ->where('affiliate_comm.status', 1)
                ->whereIn('affiliate_comm.comm_status', [1,2])->update($updateArr);

                $email =  $getDetails->email ;
                $dataArr = ['name' => $getDetails->name, 'amount' => $amount ,'account_no' => $getDetails->account_no];
                $body = view('email.payout', compact('dataArr'));
                $this->SMTPMailSend($body, $email, 'PAYMENT CONFIRMATION', $file = null, 1);
            if($update){
                return redirect('admin/payouts/1')->with('message', 'Payout send Successfully!');
            }    

        }

    }


    public function videoWatch(Request $request){

       $userId = auth()->user()->id;
       $update = DB::table('users')->where('id', $userId)->update(['is_watch_video' => 1]);
       echo json_encode(['status' =>'success']);
    }

    public function deleteCourse(Request $request){
        $id = $request->id;
        $delete = DB::table('main_course')->where('id', $id)->delete();
    }

    public function members(Request $request , $type){
        $query = DB::table('users');
        if($type == 1){
            $query->whereDate('created_at', Carbon::today());
        }
        $query->where('order_status', 1)->where('id','!=', 1);
        $users = $query->get();

         return view('admin.user.list', compact('users'));
    }


    public function refundAmount(Request $request , $userId){
        $getresult = DB::table('affiliate')->where('user_id', $userId)->first();
        $update = DB::table('affiliate')->where('user_id', $userId)->update(['status' => 3]);

        $update2  = DB::table('affiliate_comm')->where('affiliate_id', $getresult->id)->update(['status' => 3]);
        $update2  = DB::table('users')->where('id', $userId)->update(['order_status' => 3]);
                
        if($update2){
            return redirect('admin/view/'.$userId)->with('message', 'Refund Successfully!');
        }
    }

    public function assignAponsor(Request $request , $userId){
        $getDetails = DB::table('users')->select('id', 'name', 'email', 'package_id')->where('id', $userId)->first();
        $users = DB::table('users')->select('id', 'name','email', 'package_id', 'ref_by_user')
        ->where('order_status', 1)
        ->where('id','!=', 1)
        ->orderBy('name', 'asc')
        ->get();
        return view('admin.user.assign-sponsor', compact('getDetails', 'users'));
    }

    public function addSponsor(Request $request){
        $currentUserId = $request->currentUserId;
        $currentUserPack = $request->currentUserPack;
        $currentUserEmail = $request->currentUserEmail;
        $sponsorPack = $request->sponsorPack;
        $sponsorId = $request->sponsorId;
        $superSponsor = $request->superSponsor;
        $superSponsorPackId = "";

        if(isset($superSponsor) && !empty($superSponsor)){
            $getSupSpoInfo = DB::table('users')->select('name', 'email','package_id')->where('id', $superSponsor)->first();
            $superSponsorPackId = $getSupSpoInfo->package_id;
        }

        $packageAmount = [];
        $updateArr = [];
        $parentsArr = [$sponsorId];
        $totalParentsArr = [];

        $firstSponsorName = $request->firstSponsorName;
        $firstSponsorEmail = $request->firstSponsorEmail;

        $packageData = DB::table('packages')->select('id','name', 'direct', 'passive', 'fund')
        ->where('id', $currentUserPack)->first();

        if(isset($superSponsor) && !empty($superSponsor)){
            //$getSupSpoPack = DB::table('users')->select('name', 'email','package_id')->where('id', $superSponsor)->first();
            $superSponsorPackId = $superSponsorPackId;
            $updateArr['sponsor'] = $superSponsorPackId;
            array_push($parentsArr, $superSponsor);
            $packageAmount = DB::table('package_price')->select('id', 'amount' ,'direct', 'passive')
                ->where('from_package', $sponsorPack)
                ->where('to_package_id', $currentUserPack)
                ->where('sponsor', $superSponsorPackId)
                ->first();
        }

        else if(empty($superSponsor) && !empty($sponsorPack)){
                $packageAmount = DB::table('package_price')->select('id', 'amount' ,'direct', 'passive')
                ->where('from_package', $sponsorPack)
                ->where('to_package_id', $currentUserPack)
                ->first();
                // $updateArr['sponsor'] = !empty($getSponsor->package_id) ? $getSponsor->package_id : NULL;
        }


        $totalParentsArr = $parentsArr;
        array_push($totalParentsArr, $currentUserId);

        $directAmount =  !empty($packageAmount) ? $packageAmount->direct : $packageData->direct;
        $passiveAmount = !empty($packageAmount) ? $packageAmount->passive : $packageData->passive;
        $fundAmount = $packageData->fund;

        $getOrderInfo = DB::table('orders')->where('user_id', $currentUserId)->orderBy('id', 'desc')->first();

        if(isset($getOrderInfo) && !empty($getOrderInfo)){

            $referral_code = mb_substr(strtoupper($getOrderInfo->customerName), 0, 4).rand(11111,99999);

            $activePack = DB::table('users')->where('id', $currentUserId)
            ->update(['order_status' => 1, 'ref_by_user' => $sponsorId, 'referral_code' => $referral_code]);
            

            $updateArr['ref_by'] = $sponsorId;
            $updateArr['from_package'] = $sponsorPack;
            $updateArr['to_package_id'] = $currentUserPack;
            $updateArr['direct_income'] =  $directAmount;
            $updateArr['passive'] = $passiveAmount;
            $updateArr['fund'] = $fundAmount;

            $update = DB::table('orders')->where('id', $getOrderInfo->id)->update($updateArr);
              
            $getAff = DB::table('affiliate')->where('order_id', $getOrderInfo->id)->first();
           

            if(isset($getAff) && !empty($getAff)){
                $updateArr = [
                    'user_id' => $currentUserId,
                    'package_id' => $currentUserPack,
                    'send_by' => $sponsorId,
                    'amount' => $getOrderInfo->amount,
                    'parents' => implode(',', $parentsArr),
                    'total_parents' => implode(',', $totalParentsArr),
                    'timestamp' => time(),
                    'order_id' => $getOrderInfo->id
                ];

                $update =  Affiliate::where('id', $getAff->id)->update($updateArr);

                $affiliate_comm = DB::table('affiliate_comm')->where('affiliate_id', $getAff->id)->get();

                if(isset($affiliate_comm) && !empty($affiliate_comm)){
                    $delete = DB::table('affiliate_comm')->where('affiliate_id', $getAff->id)->delete();
                }

                        $affId = $getAff->id;
                        $amount = $getOrderInfo->amount;
                        if(isset($parentsArr) && !empty($parentsArr)){
                     
                               for($i=0; $i < count($parentsArr); $i++){
                                $insertArr = array(
                                    'affiliate_id'=> $affId,
                                    'user_id'=> ($parentsArr[$i]) ? ($parentsArr[$i]) : null,
                                    'timestamp' => time(),
                                );
                                if(count($parentsArr) == 1){
                                    if($i == 0){
                                        $insertArr['amount'] = $directAmount;
                                        $insertArr['owner_amount'] = 0;
                                        $insertArr['comm_status'] = 1;
                                        $insertArr['company_amount'] = $amount- $directAmount;
                                    }
                                }

                                if(count($parentsArr) == 2){
                                    if($i == 0){
                                        $insertArr['amount'] = $directAmount;
                                        $insertArr['owner_amount'] = 0;
                                        $insertArr['company_amount'] = 0;
                                        $insertArr['comm_status'] = 1;
                                    }elseif($i == 1){
                                        $insertArr['amount'] = $passiveAmount;
                                        $insertArr['owner_amount']= 0;
                                        $insertArr['comm_status'] = 2;
                                        $insertArr['company_amount'] = $amount - ( $directAmount+ $passiveAmount);
                                    }
                                }

                                if(count($parentsArr) == 3){
                                    if($i == 0){
                                        $insertArr['amount'] = $directAmount;
                                        $insertArr['owner_amount'] = 0;
                                        $insertArr['company_amount'] = 0;
                                        $insertArr['comm_status'] = 1;
                                    }elseif($i ==1){
                                        $insertArr['amount'] = $passiveAmount;
                                        $insertArr['owner_amount'] = 0;
                                        $insertArr['company_amount'] = 0;
                                        $insertArr['comm_status'] = 2;
                                    }elseif($i == 2){
                                        $getThird = User::select('enable_third_tier')->where('id', $parentsArr[$i])->first();
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
            }else{

                $inserArr2 = [
                    'user_id' => $currentUserId,
                    'package_id' => $currentUserPack,
                    'send_by' => $sponsorId,
                    'amount' => $getOrderInfo->amount,
                    'parents' => implode(',', $parentsArr),
                    'total_parents' => implode(',', $totalParentsArr),
                    'timestamp' => time(),
                    'order_id' => $getOrderInfo->id
                ];

                $insertAff =  Affiliate::Create($inserArr2);
                $affId = $insertAff->id;
                $amount = $getOrderInfo->amount;
                if(isset($parentsArr) && !empty($parentsArr)){
             
                       for($i=0; $i < count($parentsArr); $i++){
                        $insertArr = array(
                            'affiliate_id'=> $affId,
                            'user_id'=> ($parentsArr[$i]) ? ($parentsArr[$i]) : null,
                            'timestamp' => time(),
                        );
                        if(count($parentsArr) == 1){
                            if($i == 0){
                                $insertArr['amount'] = $directAmount;
                                $insertArr['owner_amount'] = 0;
                                $insertArr['comm_status'] = 1;
                                $insertArr['company_amount'] = $amount- $directAmount;
                            }
                        }

                        if(count($parentsArr) == 2){
                            if($i == 0){
                                $insertArr['amount'] = $directAmount;
                                $insertArr['owner_amount'] = 0;
                                $insertArr['company_amount'] = 0;
                                $insertArr['comm_status'] = 1;
                            }elseif($i == 1){
                                $insertArr['amount'] = $passiveAmount;
                                $insertArr['owner_amount']= 0;
                                $insertArr['comm_status'] = 2;
                                $insertArr['company_amount'] = $amount - ( $directAmount+ $passiveAmount);
                            }
                        }

                        if(count($parentsArr) == 3){
                            if($i == 0){
                                $insertArr['amount'] = $directAmount;
                                $insertArr['owner_amount'] = 0;
                                $insertArr['company_amount'] = 0;
                                $insertArr['comm_status'] = 1;
                            }elseif($i ==1){
                                $insertArr['amount'] = $passiveAmount;
                                $insertArr['owner_amount'] = 0;
                                $insertArr['company_amount'] = 0;
                                $insertArr['comm_status'] = 2;
                            }elseif($i == 2){
                                $getThird = User::select('enable_third_tier')->where('id', $parentsArr[$i])->first();
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

            if ($currentUserEmail) {
                $dataArr = [
                            'customer_name' => $getOrderInfo->customerName,
                            'package_name' => $packageData->name,
                        ];
                $body = view('email.welcome', compact('dataArr'));
                $this->SMTPMailSend($body, $currentUserEmail, 'Welcome to Growth Addicted', $file = null, 1);
            }


                if(isset($sponsorId) && !empty($sponsorId)){
                    $email = $firstSponsorEmail;
                    $dataArr = [
                        'name' => $firstSponsorName, 
                        'customer_name' => $getOrderInfo->customerName,
                        'package_name' => $packageData->name,
                        'directAmount' => $directAmount
                    ];
                    
                    $body = view('email.new_refferral', compact('dataArr'));
                    $this->SMTPMailSend($body, $email, 'NEW REFERRAL', $file = null, 1);
                }

                if(isset($superSponsor) && !empty($superSponsor)){
                    $email = $getSupSpoInfo->email;
                    $dataArr = [
                        'name' => $getSupSpoInfo->name, 
                        'customer_name' => $firstSponsorName,
                        'package_name' => $packageData->name,
                        'passiveAmount' => $passiveAmount
                    ];

                    $body = view('email.team_helping_bonus', compact('dataArr'));
                    $this->SMTPMailSend($body, $email, 'TEAM HELPING BONUS', $file = null, 1);
                }
        }

        return redirect('admin/view/'.$currentUserId)->with('message', 'Sponsor added Successfully!');
    }



    public function emailTemplateListing(Request $request)
    {
        $templates = DB::table('templates')->get();
        return view('admin.template.list', compact('templates'));
    }

    public function emailTemplate(Request $request)
    {
         return view('admin.template.add');
    }

    public function saveEmailTemplate(Request $request)
    {
       
       $insertArr = [
            'title' => $request->title,
            'subject' => $request->subject,
            'message' => $request->message,
       ];

       $insert = DB::table('templates')->insert($insertArr);
       if($insert){
            return redirect('admin/email-template-list/')->with('message', 'Templates added Successfully!');
       }
    }

    public function deleteTemplate(Request $request , $tempId){

       $delete = DB::table('templates')->where('id', $tempId)->delete();
       if($delete){
            return redirect('admin/email-template-list/')->with('message', 'Templates deleted Successfully!');
       }
    }

    public function sendEmailForm(Request $request)
    {

        $templates = DB::table('templates')->get();
        $users = DB::table('users')->select('id', 'name', 'email')->where('order_status', 1)->get();
        return view('admin.template.send', compact('templates', 'users'));
        
    }

    public function sendEmailToUsers(Request $request)
    {

        $template = DB::table('templates')->where('id', $request->template)->first();
        $tempSubject = $template->subject;

        if(isset($request->all) && ($request->all == 1)){
            $users = DB::table('users')->select('id', 'name', 'email')->where('order_status', 1)->chunk(500, function($rows) {
                foreach ($rows as  $row2) {
                    $userName = $row2->name;
                    $email = $row2->email;
                    $dataArr = ['name' => $userName, 'template' => $template->message];

                    $body = view('email.emailTemplate', compact('dataArr'));
                    $this->SMTPMailSend($body, $email, $tempSubject, $file = null, 1);

                }
            });
        }else{
            foreach ($request->users as  $row2) {
                $resultArr = explode('||', $row2);
                $userName = $resultArr[0];
                $email = $resultArr[1];
                $dataArr = ['name' => $userName, 'template' => $template->message];
                $body = view('email.emailTemplate', compact('dataArr'));
                $this->SMTPMailSend($body, $email, $tempSubject, $file = null, 1);
            }
        }
        return redirect('admin/send-email-users')->with('message', 'Email sends Successfully!');
    }


    public function allBankRequest(Request $request){
        $bankRequest = DB::table('user_account_request')->select('user_account_request.id','user_account_request.bankName','user_account_request.account_no','user_account_request.ifsc_code','user_account_request.status','user_account_request.user_id','users.name')
        ->leftJoin('users', 'user_account_request.user_id', '=', 'users.id')
        ->where('user_account_request.status', 0)->orderBy('user_account_request.id', 'desc')->get();
        return view('admin.bank.list', compact('bankRequest'));
    }

    public function rejectBankRequest(Request $request, $id){
        $delete = DB::table('user_account_request')->where('id', $id)->delete();
        if($delete){
            return redirect('admin/bank-request')->with('message', 'Request Deleted Successfully!');
        }
    }

    public function updateBankDetails(Request $request , $reqid){
        $bankRequest = DB::table('user_account_request')->select('user_account_request.id','user_account_request.bankName','user_account_request.account_no','user_account_request.ifsc_code','user_account_request.status','user_account_request.user_id','users.name', 'users.email', 'users.mobile_no')
        ->leftJoin('users', 'user_account_request.user_id', '=', 'users.id')
        ->where('user_account_request.id', $reqid)->first();

        $postData = [
            "name" => $bankRequest->name,
            "email" =>$bankRequest->email,
            "contact" => $bankRequest->mobile_no,
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

        if(isset($resultArr->error)){
         return redirect('admin/bank-request/')->with('error', $resultArr->error->description);    

        }
       
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
                "name" => $bankRequest->name,
                "ifsc" => $bankRequest->ifsc_code,
                "account_number" => $bankRequest->account_no,
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


        $update = DB::table('bankdetails')->where('user_id', $bankRequest->user_id)
        ->update(
            [
                'bank_name' => $bankRequest->name,
                'account_no' => $bankRequest->account_no,
                'ifsc_code' =>$bankRequest->ifsc_code, 
                'customer_id' => $contactId, 
                'fund_id' => $fundId, 
                'status' => 1
            ]
        );

       if($update){
            DB::table('user_account_request')->where('id', $bankRequest->id)->update(['status' => 1]);     

            return redirect('admin/bank-request/')->with('message', 'Account Details Updated Successfully!');       
       }

    }


    public function leaderboard(Request $request){
        $time = time();
        $lastThirtydays = date('Y-m-d', strtotime('-30 days'));
        $sevenDate = strtotime("-7 day", $time);
        $lastSevendays = date('Y-m-d', strtotime('-7 days'));
        $month = strtotime("+30 day", $time);

        $previous =  date('Y-m-d');
        $previous = strtotime($previous);
        $previous = strtotime("midnight", $previous);
        $day_before = $previous;

        $lastSeven = DB::table('affiliate_comm')->select('user_id', DB::raw('
        SUM(amount) as amount'))
        ->leftJoin('users', 'affiliate_comm.user_id', '=', 'users.id')
        ->whereBetween('timestamp', [ strtotime($lastSevendays) , time() ])
        ->addSelect(['name' => User::select('name')
            ->whereColumn('affiliate_comm.user_id', 'users.id')
            ->limit(1)
        ])
        ->addSelect(['profile_pic' => User::select('profile_pic')
            ->whereColumn('affiliate_comm.user_id', 'users.id')
            ->limit(1)
        ])
        ->where('affiliate_comm.comm_status', '!=', 3)
        // ->where('users.is_show_leaderboard', 1)
        ->groupBy('affiliate_comm.user_id')
         ->orderByRaw('SUM(amount) DESC')
        ->orderBy('affiliate_comm.amount','desc')
        // ->limit(10)
        ->get();

        $currentMonth = DB::table('affiliate_comm')->select('user_id', DB::raw('
        SUM(amount) as amount'))
        ->leftJoin('users', 'affiliate_comm.user_id', '=', 'users.id')
        ->whereBetween('timestamp', [ strtotime($lastThirtydays) , time()])
        ->addSelect(['name' => User::select('name')
            ->whereColumn('affiliate_comm.user_id', 'users.id')
            ->limit(1)
        ])
        ->addSelect(['profile_pic' => User::select('profile_pic')
            ->whereColumn('affiliate_comm.user_id', 'users.id')
            ->limit(1)
        ])
       // ->where('users.is_show_leaderboard', 1)
        ->where('affiliate_comm.comm_status', '!=', 3)
        ->groupBy('affiliate_comm.user_id')
         ->orderByRaw('SUM(amount) DESC')
        ->orderBy('affiliate_comm.amount','desc')
        // ->limit(10)
        ->get();


        $allTime = DB::table('affiliate_comm')->select('user_id', DB::raw('
        SUM(amount) as amount'))
        ->leftJoin('users', 'affiliate_comm.user_id', '=', 'users.id')
        ->addSelect(['name' => User::select('name')
            ->whereColumn('affiliate_comm.user_id', 'users.id')
            ->limit(1)
        ])
        ->addSelect(['profile_pic' => User::select('profile_pic')
            ->whereColumn('affiliate_comm.user_id', 'users.id')
            ->limit(1)
        ])
       // ->where('users.is_show_leaderboard', 1)
        ->where('affiliate_comm.comm_status', '!=', 3)
        ->groupBy('affiliate_comm.user_id')
        ->orderByRaw('SUM(amount) DESC')
        ->orderBy('affiliate_comm.amount','desc')
        // ->limit(10)
        ->get();
      
        return view("admin.leaderboard.leaderboard", compact('lastSeven', 'currentMonth', 'allTime'));
    }


    public function commission(Request $request , $type){

        $lastSevendays = date('Y-m-d', strtotime('-7 days'));
        
        $previous =  date('Y-m-d');
        $previous = strtotime($previous);
        $previous = strtotime("midnight", $previous);
        $todaytimestamp = strtotime('today midnight'); 
        $lastThirtydays = date('Y-m-d', strtotime('-30 days'));

        $query = DB::table('affiliate_comm')
        ->select('users.id','affiliate_comm.status','users.name','bankdetails.customer_id', 'bankdetails.fund_id','users.email','users.mobile_no', DB::raw('SUM(affiliate_comm.amount) AS amount'))
        ->leftJoin('users', 'affiliate_comm.user_id', '=', 'users.id') 
        ->leftJoin('affiliate', 'affiliate_comm.affiliate_id', '=', 'affiliate.id')
        ->leftJoin('bankdetails', 'users.id', '=', 'bankdetails.user_id');
        if($type == 2 || $type == 1){
            $query->where('affiliate_comm.timestamp','>', $previous);
        }

        if($type == 4){
            $query->whereBetween('affiliate_comm.timestamp', [strtotime($lastSevendays) , $previous]);
        }

        if($type == 5){
            $query->whereBetween('affiliate_comm.timestamp', [strtotime($lastThirtydays) , $previous]);
        }
        $query->where('users.name', '!=', '');
        $query->where('affiliate.status', 1);
        $query->whereIn('affiliate_comm.comm_status', [1,2]);
        $query->groupBy('affiliate_comm.user_id');
        $getDetails = $query->get();
        return view('admin.bonus.todaysComm', compact('getDetails', 'type'));
    }


     public function directSale(Request $request , $id){

            $packages = Packages::select(DB::raw( 'group_concat(QUOTE(name)) as "name" '))->first();
            $userId = $id;
            $query = DB::table('affiliate')
            ->select('affiliate.id','affiliate.user_id','affiliate.package_id','affiliate.send_by','affiliate_comm.amount','affiliate.parents', 'affiliate.status','affiliate.timestamp', 'packages.id as packageId' ,'packages.name as packageName', 'users.name','users.id as userId', 'profile_pic', 'users.referral_code')
            ->leftJoin('packages', 'affiliate.package_id', '=', 'packages.id')
            ->leftJoin('users', 'affiliate.user_id', '=', 'users.id')
            ->leftJoin('affiliate_comm', 'affiliate.id', '=', 'affiliate_comm.affiliate_id')
            ->where('affiliate.send_by', $userId);
            
            if(isset($request->fromDate) && !empty($request->fromDate)){
                $query->whereBetween('affiliate_comm.timestamp', [strtotime($request->fromDate) , strtotime($request->toDate)]);
            } 

            if(isset($request->packageId)){
                $query->where('packages.id', $request->packageId);
            }
            $query->where('affiliate_comm.comm_status', 1);
            $getDetails =  $query->get();
            $packagesArr = DB::table('packages')->get();
            return view('admin.bonus.direct_income', compact('getDetails','userId', 'packagesArr'));
        }



    public function sendBulkPayout(Request $request){
        $userData = $request->userData;
        
        if(isset($userData) && !empty($userData)){
            $userData = explode(',', $userData);
            foreach ($userData as $row) {
                $userDataArr = explode('__', $row) ;
                $id = $userDataArr[0];
                $amount = $userDataArr[1];

            $getDetails = DB::table('bankdetails')->select('customer_id','bankdetails.account_no', 'fund_id', 'users.name','users.email')
            ->leftJoin('users', 'bankdetails.user_id', '=', 'users.id')
            ->where('bankdetails.user_id', $id)->first();
            if(isset($getDetails->fund_id) && !empty($getDetails->fund_id)){
               $postData = [
                    
                    "account_number" => "4564563975882261",
                    "fund_account_id" => $getDetails->fund_id,
                    "amount" => $amount.'00',
                    "currency" => "INR",
                    "mode"=> "IMPS",
                    "purpose"=> "payout",
                    "queue_if_low_balance"=> true,
                    "reference_id"=> 'Contact Id '.rand(1111111,9999999),
                    "narration"=> "Acme Corp Fund Transfer",
                ]; 
                

                $ch = curl_init();

                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, 'https://api.razorpay.com/v1/payouts');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
                curl_setopt($ch, CURLOPT_USERPWD, 'rzp_live_HglbfWetBA3Ylq' . ':' . '7pN0zxbjttSSKWeKVhUjpkCo');


                $headers = array();
                $headers[] = 'Content-Type: application/json';
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                $result = curl_exec($ch);

                $resutArr = json_decode($result);

                if (curl_errno($ch)) {
                    echo 'Error:' . curl_error($ch);
                    }
                    curl_close($ch);

                    if($resutArr->status == "processing"){

                        $updateArr = ['status' => 2, 'payout_timestamp' => time()];
                        $update = DB::table('affiliate_comm')
                            ->where('affiliate_comm.user_id', $id)
                            /*->whereDate('affiliate_comm.created_at', Carbon::today())*/
                            ->where('affiliate_comm.status', 1)
                            ->whereIn('affiliate_comm.comm_status', [1,2])->update($updateArr);

                            $email =  $getDetails->email ;
                            $dataArr = ['name' => $getDetails->name,'amount' => $amount ,'account_no' => $getDetails->account_no];


                            $body = view('email.payout', compact('dataArr'));
                            $this->SMTPMailSend($body, $email, 'PAYMENT CONFIRMATION', $file = null, 1);
                           
                    }
                }
            }
        }

        echo json_encode(['status' => 'success', 'msg' => "payout send Successfully !"]);
       exit();
    
    }


    public function adminListing(Request $request){
        if ($request->ajax()) {
            $users = User::select('id', 'name','status','state','mobile_no','email', 'ref_by_user')
                    ->where('role', 1)->orderBy('id', 'desc');
            return Datatables::of($users)
                    
                    ->addColumn('status', function($row){
                        if($row->status == 1){
                           $btn = '<span class="chip green lighten-5"><span class="green-text">Active</span></span>';
                        }else{
                            $btn = '<span class="chip red lighten-5"><span class="red-text">Inactive</span></span>';
                        }
                        return $btn;
                    })

                    ->addColumn('action', function($row){
                           $btn = '<a href="edit-admin-user/'.$row->id.'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit"><i class="material-icons">edit</i></a>';
                            return $btn;
                    })
                    ->rawColumns(['sponsor_name','status','state','comm_status','action'])
                    ->make(true);
        }

        $users = User::where('role', 1)->orderBy('id', 'desc');
        return view('admin.user.admin.list', compact('users'));
    }


    public function editAdminUser($id){
        $getDetails = User::find($id);
        $permissions = DB::table('permission')->where('user_id', $id)->first();
        return view('admin.user.admin.edit', compact('getDetails', 'permissions'));
    }


    public function updateAdminUserDetails(Request $request){
        
        $updateArr = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status,
            'user_pass' => $request->password
        ];

        $update = DB::table('users')->where('id', $request->user_id)->update($updateArr);

         DB::table('permission')->where('id', $request->permissionId)->update([
            "is_usersListing" =>!empty($request->usersListing) ? $request->usersListing : 0 ,
            "is_adminUserListing" =>!empty($request->adminUserListing) ? $request->adminUserListing : 0 ,
            "is_packages" =>!empty($request->packages) ? $request->packages : 0 ,
            "is_course" =>!empty($request->course) ? $request->course : 0 ,
            "is_traffic" =>!empty($request->traffic) ? $request->traffic : 0 ,
            "is_payouts" =>!empty($request->payouts) ? $request->payouts : 0 ,
            "is_leaderboard" =>!empty($request->leaderboard) ? $request->leaderboard : 0 ,
            "is_offers" =>!empty($request->offers) ? $request->offers : 0 ,
            "is_setting" =>!empty($request->setting) ? $request->setting : 0 ,
            "is_training" =>!empty($request->training) ? $request->training : 0 ,
            "is_emailTemplate" =>!empty($request->emailTemplate) ? $request->emailTemplate : 0 ,
            "is_account" =>!empty($request->account) ? $request->account : 0 ,
            "is_dashboard" =>!empty($request->is_dashboard) ? $request->is_dashboard : 0 ,
            "is_profile" =>!empty($request->is_profile) ? $request->is_profile : 0 ,
            "is_search" =>!empty($request->is_search) ? $request->is_search : 0 ,
            "is_bank_req" =>!empty($request->is_bank_req) ? $request->is_bank_req : 0 ,
        ]);

        if($update){
            return redirect('admin/admin-listing')->with('message', 'User Updated Successfully!');
        }

    }

    public function sendWelcomeMail(Request $request)
    {
        $getDetails = User::select('id', 'name', 'email')->where('id', $request->userId)->first();
        $dataArr = ['customer_name' => $getDetails->name];
        $email = $getDetails->email;

        $body = view('email.welcome', compact('dataArr'));
        $this->SMTPMailSend($body, $email, 'Welcome to Growth Addicted', $file = null, 1);

        if($mail){
            echo json_encode(['status' => "success", 'msg' => "Welcome email has been send Successfully !"]);
            exit();
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

 }