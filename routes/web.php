<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Auth.login');
});

Auth::routes();
// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/sendmail', [App\Http\Controllers\MailController::class, 'SendMail'])->name('sendmail');
Route::get('/activeuser/{slug}', [App\Http\Controllers\MailController::class, 'ActiveUser'])->name('activeuser');
Route::get('/ForgotPassword', [App\Http\Controllers\MailController::class, 'ForgotPassword'])->name('ForgotPassword');
Route::post('/Resetpassword', [App\Http\Controllers\MailController::class, 'Resetpassword'])->name('Resetpassword');
Route::get('/Resetpassword', [App\Http\Controllers\MailController::class, 'Resetpassword'])->name('Resetpassword');
Route::post('/setpassword', [App\Http\Controllers\MailController::class, 'SetPassword'])->name('setpassword');
Route::get('/setpassword', [App\Http\Controllers\MailController::class, 'SetPassword'])->name('setpassword');
Route::get('/EnterOtp', [App\Http\Controllers\MailController::class, 'EnterOtp'])->name('EnterOtp');
Route::post('/newpassword', [App\Http\Controllers\MailController::class, 'NewPassword'])->name('newpassword');
Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'AdminDashboard'])->name('AdminDashboard');
