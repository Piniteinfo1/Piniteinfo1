<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
    	return view('Admin.admindashboard');
    }
    // public function mail(Request  $Request)
    // {
    // 	// $email = "chanduakula111@naarsoft.com";
    // 	// dd($Request->all());
    // 	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // 		echo "k";
    // 	}else{
    // 		echo "string";
    // 	}
    // }
}
