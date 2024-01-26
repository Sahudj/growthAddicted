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

class OffersController extends Controller
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
    public function offers(Request $request){
        $offers = DB::table('offers')->where('status', 1)->where('type', 0)->get();
        return view("user.offers.offer", compact('offers'));
    }

    public function marketingMaterial(Request $request){
        $offers = DB::table('offers')->where('status', 1)->where('type', 1)->get();
        return view("user.offers.marketingmaterial", compact('offers'));
    }

    public function funds(Request $request){
        $userId = auth()->user()->id;
        $totalFunds = DB::table('affiliate_comm')->where('user_id', $userId)
        ->where('status', 1)->where('comm_status', 3)->sum('amount');
        return view("user.funds.funds", compact('totalFunds'));
    }


}
