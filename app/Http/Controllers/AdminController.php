<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
    	return view('Admin.admindashboard');
    }
    public function photo()
    {
    	return view('photo');
    }
    public function upload(Request $Request)
    {
    	$file= $Request->file('image');
    	$filename= '1' . $file->getClientOriginalName();
    	$r = $file-> move(public_path('public/Image'), $filename);
    	// $imageName = $Request->getClientOriginalExtension();
    	// dd($r);
    	// dd($imageName);
    	// $r = request()->image->move(public_path('images'), $imageName);
    	// dd($r);
    }
}
