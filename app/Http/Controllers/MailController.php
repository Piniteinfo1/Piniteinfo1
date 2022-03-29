<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\models\Resetpassword;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class MailController extends Controller
{
    public function SendMail()
    {	
      $data = array('name'=>"Virat Gandhi");
    	//dd('email check');
   
      $mail = Mail::send(['html'=>'mail'], $data, function($message) {
         $message->to('chanduakula111@gmail.com', 'Tutorials Point')->subject
            ('Laravel Basic Testing Mail');
         $message->from('xyz@gmail.com','Virat Gandhi');
      });
      echo "Basic Email Sent. Check your inbox.";
    }
    public function ActiveUser(Request $Request, $slug)
    {
        \DB::table('users')->where('slug' , $slug)->update([
          'IsActive' => 1,
        ]);
          return redirect()->route('login')->with('message', 'User Activated Sucessfully');
    }
    public function ForgotPassword()
    {
        return view('mail.ForgotPassword');
    }
    public function Resetpassword(Request $request)
    {
        if($request->email == null)
        {
            return Redirect::back()->withErrors(['message' => 'Please enter email']);
        }else{
        }
        $CheckMail = \DB::table('users')->where('email', $request->email)->first();
        if($CheckMail == null)
        {
          return Redirect::back()->withErrors(['message' => 'Invalid User']);
        }else{
            $data = [
           'otp' => Str::random(5)
            ];
            // dd($request->all());
            $email = $request->email;
            $EmailVerify = $this->EmailCheck($email); 
            $otpdata = $this->OtpData($EmailVerify);
            // dd($otpdata);
            if($otpdata == null)
            {
                $otp = new Resetpassword;
                $otp->otp = $data['otp'];
                $otp->user_id = $EmailVerify->id;
                $otp->save();
            }else{
              // dd($otpdata);
              \DB::table('resetpasswords')->where('user_id', $otpdata->user_id)->update([
                'otp' => $data['otp']
              ]);
            }
            
            $mail = Mail::send(['html'=>'resetotp'], $data, function($message) {
              $message->to('chanduakula111@gmail.com', 'Tutorials Point')->subject('Laravel Basic Testing Mail');
              $message->from('xyz@gmail.com','Virat Gandhi');
      });
        }
        return view('mail.enterotp',compact('email'));
        // dd('dgdfgdfg');
        // return redirect()->route('EnterOtp')->with(['email' => $email]);
    }
    public function EnterOtp(Request $request, $email)
    {
      dd($email);
        return view('mail.enterotp');
    }
    public function EmailCheck($email)
    {
        return \DB::table('users')->where('email', $email)->select('id')->first();
    }
    public function OtpData($EmailVerify)
    {
        return \DB::table('Resetpasswords')->where('user_id', $EmailVerify->id)->first();
    }
    public function SetPassword(Request $request)
    {
        $email = $request->email;
        $Email_id = \DB::table('users')->where('email', $request->email)->first();
        $otp = \DB::table('resetpasswords')->where('user_id', $Email_id->id)->select('otp')->first();
        // dd($email);
        if($request->otp != null && $request->otp == $otp->otp)
        {
           return view('mail.changepassword',compact('email'));
        }else{
            return view('mail.enterotp',compact('email'))->withErrors(['message' => 'invalid otp']);
        }

       // $otp = \DB::table('resetpasswords')->select('resetpasswords.otp')->join('users','users.id','=','resetpasswords.user_id')->where(['email' => $request->email])->first();
       // dd($email);

    }
    public function NewPassword(Request $request)
    {
        \DB::table('users')->where('email', $request->email)->update([
          'password' => Hash::make($request->password)
        ]);
    }
}
