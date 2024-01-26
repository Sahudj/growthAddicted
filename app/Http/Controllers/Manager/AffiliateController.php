<?php

namespace App\Http\Controllers\Manager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\States;
use App\Models\Packages;
use Illuminate\Support\Facades\File;  
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;
use Session;
use Mail;
use App\Mail\Notification;
use Illuminate\Support\Facades\Crypt;

class AffiliateController extends Controller
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

    
    public function affiliate(){
        $packages = Packages::all();
        $setting = DB::table('setting')->where('meta_key', '=', 'orientation_video')->first();
        return view('user.affiliate.affiliate', compact('packages', 'setting'));
    }

    public function generateLink(Request $request){
        $packageId = $this->encryptor('encrypt', $request->packageId);
        $userId = $this->encryptor('encrypt', auth()->user()->id) ;
        $url = env('APP_URL').'signup?'."eid=".$userId."&pid=".$packageId; 
        return $url;
    }

    
    



}
