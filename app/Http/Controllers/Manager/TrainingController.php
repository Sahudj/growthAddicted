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
class TrainingController extends Controller
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

    public function training(Request $request){
        $todaytimestamp = strtotime('today midnight'); 
        $training = DB::table('training')->where('status', 1)->get();
        return view("user.training.training", compact('training'));
    }

    public function webinar(Request $request){
        $listing = DB::table('webinar')->where('status', 1)->get();
        return view("user.webinar.webinar", compact('listing'));
    }


    public function QAsession(Request $request){
        $sessions = DB::table('q_a_session')->where('status', 1)->get();
        return view("user.sessions.sessions", compact('sessions'));
    }

    public function support(Request $request){
        return view("user.support.support");
    }

    public function contactMail(Request $request){
        $toEmail =  'care@growthaddicted.com' ;
        $fromEmail =  $request->email ;
        $dataArr = ['name' => $request->name , 'subject' => $request->subject, 'email' => $request->email, 'message' => $request->message];
        $subject = $request->subject;
        $mail = Mail::send('email.contact-mail', ["dataArr"=> $dataArr], function ($message) use ($toEmail, $fromEmail, $subject)
        {  
            $message->subject($subject);
            $message->from(env('MAIL_FROM_ADDRESS'),'GROWTH ADDICTED');
            $message->to($toEmail);
        });

        return redirect('user/support')->with('message', 'Email send Successfully!');  
    }

    public function leaderboard(Request $request){
        $skip = ($request->page - 1) * 10;
        $userId = auth()->user()->id; 
        $time = time();
        $lastThirtydays = date('Y-m-d', strtotime('-30 days'));
        $sevenDate = strtotime("-7 day", $time);
        $lastSevendays = date('Y-m-d', strtotime('-7 days'));
        $month = strtotime("+30 day", $time);

        $previous =  date('Y-m-d');
        $previous = strtotime($previous);
        $previous = strtotime("midnight", $previous);
        $day_before = $previous;

        $queryToday = DB::table('affiliate_comm')->select('user_id', DB::raw('
        SUM(amount) as amount'))
        ->leftJoin('users', 'affiliate_comm.user_id', '=', 'users.id')
        ->whereDate('affiliate_comm.created_at', Carbon::today())
        // ->whereBetween('affiliate_comm.timestamp', [ strtotime($lastSevendays) , time() ])
        ->addSelect(['name' => User::select('name')
            ->whereColumn('affiliate_comm.user_id', 'users.id')
            ->limit(1)
        ])
        ->addSelect(['profile_pic' => User::select('profile_pic')
            ->whereColumn('affiliate_comm.user_id', 'users.id')
            ->limit(1)
        ])
        ->where('affiliate_comm.comm_status', '!=', 3)
        ->where('users.is_show_leaderboard', 1)
        ->groupBy('affiliate_comm.user_id')
         ->orderByRaw('SUM(amount) DESC')
        ->orderBy('affiliate_comm.amount','desc');
        
        if(auth()->user()->role != 1){
            $todaysData = $queryToday->limit(10)->get();
        }else{
            $todaysData = $queryToday->skip($skip)->take(30)->get();
        }
  

        $query = DB::table('affiliate_comm')->select('user_id', DB::raw('
        SUM(amount) as amount'))
        ->leftJoin('users', 'affiliate_comm.user_id', '=', 'users.id')
        ->whereBetween('affiliate_comm.timestamp', [ strtotime($lastSevendays) , time() ])
        ->addSelect(['name' => User::select('name')
            ->whereColumn('affiliate_comm.user_id', 'users.id')
            ->limit(1)
        ])
        ->addSelect(['profile_pic' => User::select('profile_pic')
            ->whereColumn('affiliate_comm.user_id', 'users.id')
            ->limit(1)
        ])
        ->where('affiliate_comm.comm_status', '!=', 3)
        ->where('users.is_show_leaderboard', 1)
        ->groupBy('affiliate_comm.user_id')
         ->orderByRaw('SUM(amount) DESC')
        ->orderBy('affiliate_comm.amount','desc');
        
        if(auth()->user()->role != 1){
            $lastSeven = $query->limit(10)->get();
        }else{
            $lastSeven = $query->skip($skip)->take(30)->get();
        }
  

        $query2 = DB::table('affiliate_comm')->select('user_id', DB::raw('
        SUM(amount) as amount'))
        ->leftJoin('users', 'affiliate_comm.user_id', '=', 'users.id')
        ->whereBetween('affiliate_comm.timestamp', [ strtotime($lastThirtydays) , time()])
        ->addSelect(['name' => User::select('name')
            ->whereColumn('affiliate_comm.user_id', 'users.id')
            ->limit(1)
        ])
        ->addSelect(['profile_pic' => User::select('profile_pic')
            ->whereColumn('affiliate_comm.user_id', 'users.id')
            ->limit(1)
        ])
        ->where('users.is_show_leaderboard', 1)
        ->where('affiliate_comm.comm_status', '!=', 3)
        ->groupBy('affiliate_comm.user_id')
         ->orderByRaw('SUM(amount) DESC')
        ->orderBy('affiliate_comm.amount','desc');
        
        if(auth()->user()->role != 1){
            $currentMonth = $query2->limit(10)->get();
        }else{
            $currentMonth = $query2->skip($skip)->take(30)->get();
        }

        $query3 = DB::table('affiliate_comm')->select('user_id', DB::raw('
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
        ->where('users.is_show_leaderboard', 1)
        ->where('affiliate_comm.comm_status', '!=', 3)
        ->groupBy('affiliate_comm.user_id')
        ->orderByRaw('SUM(amount) DESC')
        ->orderBy('affiliate_comm.amount','desc');
        
        if(auth()->user()->role != 1){
            $allTime = $query3->limit(10)->get();
        }else{
            $allTime = $query3->skip($skip)->take(30)->get();
        }

      if(auth()->user()->role == 1){

        if ($request->ajax()) {
            $view = view('user.leaderboard.ajax-leaderboard',compact('todaysData','lastSeven', 'currentMonth', 'allTime'))->render();
            return response()->json(['html'=>$view]);
        }

        return view("user.leaderboard.leaderboardAdmin", compact('lastSeven', 'currentMonth', 'allTime', 'todaysData'));         
      }
        return view("user.leaderboard.leaderboard", compact('lastSeven', 'currentMonth', 'allTime'));
    }

    public function community(Request $request){
        return view("user.community.community");
    }

    public function traffic(Request $request){

        $id = auth()->user()->id;

        $query = DB::table('orders')->select('orders.id as orderId','users.id','users.name', 'orders.amount',
        'packages.name as packageName','packages.direct', 'orders.ref_by', 'users.email', 'users.mobile_no', 'users.created_at')
        ->leftJoin('users', 'orders.user_id', '=', 'users.id')
        ->leftJoin('packages', 'orders.package_id', '=', 'packages.id')
        ->where('ref_by', $id)
        ->whereNotNull('referenceId');
        
        if(isset($request->fromDate) && !empty($request->fromDate)){
            $query->whereBetween('orders.timestamp', [strtotime($request->fromDate), strtotime($request->toDate)]);
        }
        
        if(isset($request->name) && !empty($request->name)){
            $query->where('orders.customerName','like', '%'.$request->name.'%');
        }

        if(isset($request->email) && !empty($request->email)){
            $query->where('orders.customerEmail','=',$request->email);
        }

        if(isset($request->packages) && !empty($request->packages)){
            $query->where('orders.package_id','=',$request->packages);
        }
        
        $query->addSelect(['sponsorName' => User::select('name')
        ->whereColumn('orders.ref_by', 'users.id')
        ->whereNotNull('orders.ref_by')
        ->limit(1)]);

        $query->orderBy('orders.id', 'desc');
        $paidLeads = $query->groupBy('users.id')->get();
        
        $query = DB::table('orders')->select('orders.id as orderId','users.id','users.name', 'orders.amount', 
        'packages.name as packageName','packages.direct', 'orders.ref_by','users.email', 'users.mobile_no', 'users.created_at')
        ->leftJoin('users', 'orders.user_id', '=', 'users.id')
        ->leftJoin('packages', 'orders.package_id', '=', 'packages.id')
        ->where('ref_by', $id)
        ->whereNull('referenceId');
        
        if(isset($request->unpaidfromDate) && !empty($request->unpaidfromDate)){
            $query->whereBetween('orders.timestamp', [strtotime($request->unpaidfromDate), strtotime($request->unpaidtoDate)]);
        }
        
        if(isset($request->unpaidname) && !empty($request->unpaidunpaidname)){
            $query->where('orders.customerName','like', '%'.$request->unpaidname.'%');
        }

        if(isset($request->unpaidemail) && !empty($request->unpaidemail)){
            $query->where('orders.customerEmail','=',$request->unpaidemail);
        }

        if(isset($request->unpaidpackages) && !empty($request->unpaidpackages)){
            $query->where('orders.package_id','=',$request->unpaidpackages);
        }
        
        $query->addSelect(['sponsorName' => User::select('name')
        ->whereColumn('orders.ref_by', 'users.id')
        ->whereNotNull('orders.ref_by')
        ->limit(1)]);

        $query->orderBy('orders.id', 'desc');
        $unpaidLeads = $query->groupBy('users.id')->get();
        $packages = DB::table('packages')->get();
        return view("user.traffic.traffic", compact('paidLeads', 'unpaidLeads', 'packages'));
    }

        public function trafficDetails(Request $request , $id){
            $query = DB::table('orders')
            ->select('orders.id as orderId','users.id','users.name', 'orders.amount',
            'packages.name as packageName','orders.direct_income', 'orders.ref_by','packages.image as thumbnail', 'users.email', 'users.mobile_no', 'users.created_at')
                ->leftJoin('users', 'orders.user_id', '=', 'users.id')
                ->leftJoin('packages', 'orders.package_id', '=', 'packages.id')
                ->where('orders.id', $id);
            
            $query->addSelect(['sponsorName' => User::select('name')
                ->whereColumn('orders.ref_by', 'users.id')
                ->whereNotNull('orders.ref_by')
                ->limit(1)]);
            $getDetails = $query->first();     

            return view('user.traffic.view', compact('getDetails'));
        }
        
        public function viewWebinar(Request $request, $id){
            $getDetails = DB::table('webinar')->where('id', $id)->first();
            return view('user.webinar.view', compact('getDetails'));
        }

        public function searchOrder(Request $request){
            return view('admin.bonus.order-search');
        }


        public function marketingMaterial(Request $request){
            return view('admin.material.add');
        }

        public function marketingMaterialListing(Request $request){
            $offers = DB::table('offers')->where('type', 1)->get();
            return view('admin.material.list', compact('offers'));
        }

        public function saveMarketingMaterial(Request $request){

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
                    'type' => 1
                ]);
            
            return redirect('admin/all-marketing-material')->with('message', 'Marketing Material Details Added Successfully!');   
            
        }

        public function editMarketingMaterial (Request $request , $id){
            $getDetails = DB::table('offers')->where('id', $id)->first();
            return view('admin.material.edit', compact('getDetails'));
        }

        public function updateMarketingMaterial(Request $request){
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
                    'status' => $request->status,
                ]);
            
                return redirect('admin/all-marketing-material')->with('message', 'Marketing Material has been updated successfully!');   
        }

        public function deleteMarketingMaterial(Request $request, $id){
            $delete = DB::table('offers')->where('id', $id)->delete();
            if($delete){
                return redirect('admin/all-marketing-material')->with('message', 'Marketing Material has been deleted successfully!');  
            }
        }


}
