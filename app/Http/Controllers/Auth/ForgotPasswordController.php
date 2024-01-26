<?php
namespace App\Http\Controllers\Auth; 
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use DB; 
use Carbon\Carbon; 
use App\Models\User; 
use Mail; 
use Hash;
use Illuminate\Support\Str;
use PHPMailer\PHPMailer\PHPMailer;  
use PHPMailer\PHPMailer\Exception;
  
class ForgotPasswordController extends Controller
{
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showForgetPasswordForm()
      {
         return view('auth.forgetPassword');
      }
  

      /**
       * Write code on Method
       *
       * @return response()
       */

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

      public function submitForgetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:users',
          ]);
  
          $token = Str::random(64);
  
          DB::table('password_resets')->insert([
              'email' => $request->email, 
              'token' => $token, 
              'created_at' => Carbon::now()
            ]);

          $body = view('email.forgetPassword', compact('token'));
          
          $this->SMTPMailSend($body, $request->email, 'Reset Password', $file = null, 1);
  
          return back()->with('message', 'We have e-mailed your password reset link!');
      }
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showResetPasswordForm($token) { 
         return view('auth.forgetPasswordLink', ['token' => $token]);
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitResetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:users',
              'password' => 'required|string|min:6|confirmed',
              'password_confirmation' => 'required'
          ]);
  
          $updatePassword = DB::table('password_resets')
                              ->where([
                                'email' => $request->email, 
                                'token' => $request->token
                              ])
                              ->first();
  
          if(!$updatePassword){
              return back()->withInput()->with('error', 'Invalid token!');
          }
  
          $user = User::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);
 
          DB::table('password_resets')->where(['email'=> $request->email])->delete();
  
          return redirect('/login')->with('message', 'Your password has been changed!');
      }
}