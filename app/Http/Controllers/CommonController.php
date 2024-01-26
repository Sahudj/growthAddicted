<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class CommonController extends Controller
{
   
    public function index()
    {
   
    }

    public function birthdayWish(Request $request){
        $users =  DB::table("users")->select('id','name' ,'dob', 'email')->whereMonth('dob', '=',Carbon::now()->format('m'))->whereDay('dob', '=',Carbon::now()->format('d'))->whereNotNull('dob')->get();
        if(isset($users)){
            $dataArr = [];
            foreach ($users as $row) {
                $dataArr = ['name' => $row->name];
                $email = $row->email;
                $mail = Mail::send('email.birthday-wish', ["dataArr"=> $dataArr], function ($message) use ($email)
            {  
                $message->subject('Happy birthday!');
                $message->from(env('MAIL_FROM_ADDRESS'),'GROWTH ADDICTED');
                $message->to($email);
            });

                
            }
        }
    }

}
