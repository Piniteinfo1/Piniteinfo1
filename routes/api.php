<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register', [App\Http\Controllers\ApiController::class, 'register'])->name('register');
Route::post('/login', [App\Http\Controllers\ApiController::class, 'login'])->name('login');
Route::post('/Resetpassword', [App\Http\Controllers\MailController::class, 'Resetpassword'])->name('Resetpassword');
Route::post('/setpassword', [App\Http\Controllers\MailController::class, 'SetPassword'])->name('setpassword');
Route::post('/newpassword', [App\Http\Controllers\MailController::class, 'NewPassword'])->name('newpassword');
Route::group(['middleware' => ['jwt.verify']], function() {
Route::get('/check', [App\Http\Controllers\ApiController::class, 'check']);
Route::get('/logout', [App\Http\Controllers\ApiController::class, 'logout']);
});