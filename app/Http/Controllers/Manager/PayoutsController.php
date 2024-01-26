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

class PayoutsController extends Controller
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

    public function payouts(Request $request){
        $query = DB::table('affiliate_comm')
        ->select('users.id','affiliate_comm.status','users.name','bankdetails.customer_id', 'bankdetails.fund_id','users.email','users.mobile_no', DB::raw('SUM(affiliate_comm.amount) AS amount'), 'affiliate_comm.timestamp',DB::raw('DATE_FORMAT(FROM_UNIXTIME(affiliate_comm.timestamp), "%d-%m-%Y") as payoutDate' ) )
        ->leftJoin('users', 'affiliate_comm.user_id', '=', 'users.id') 
        ->leftJoin('affiliate', 'affiliate_comm.affiliate_id', '=', 'affiliate.id')
        ->leftJoin('bankdetails', 'users.id', '=', 'bankdetails.user_id');
        $query->where('affiliate_comm.status', 2);
        $query->where('affiliate_comm.user_id', auth()->user()->id);
        $query->where('users.name', '!=', '');
        
        if(isset($request->fromDate) && !empty($request->fromDate)){
            $query->whereBetween('affiliate_comm.timestamp', [strtotime($request->fromDate) , strtotime($request->toDate)]);
        }

        $query->whereIn('affiliate_comm.comm_status', [1,2]);
        $query->groupBy(DB::raw('DATE_FORMAT(FROM_UNIXTIME(affiliate_comm.timestamp), "%d-%m-%Y")'));
        $query->orderBy('affiliate_comm.id', 'desc');

        $payouts = $query->get();
       
        return view("user.payouts.payout", compact('payouts'));
    }

}
