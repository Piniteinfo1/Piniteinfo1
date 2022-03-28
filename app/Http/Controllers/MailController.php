<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
}
