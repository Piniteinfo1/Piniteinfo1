<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
       // dd($data);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users' , 'email:dns' ],
            'password' => ['required', 'string', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $VerifyEmail = $data['email'];
        //dd('check2');
        // dd($data['name'] . Str::random(40));
        // dd($data['mobile']);
        $User = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'mobile' => $data['mobile'],
            'address' => $data['address'],
            'IsActive' => 0,
            'slug' => Str::random(40),
        ]);

        $slug = $User->slug;

        $this->VerifyEmail($slug);
        return $User;
    }
    public function VerifyEmail($slug)
    {
        //dd($slug);
        $data = [
           'link' => 'activeuser' . '/' . $slug ,
           'password' => '123'
];
        //dd('email check');
   // $link = "www.facebook.com" . '/' . $slug;
      $mail = Mail::send(['html'=>'verifymail'], $data, function($message) {
         $message->to('chanduakula111@gmail.com', 'Tutorials Point')->subject
            ('Laravel Basic Testing Mail');
         $message->from('xyz@gmail.com','Virat Gandhi');
         
      });
      echo "Basic Email Sent. Check your inbox.";
    }
}
