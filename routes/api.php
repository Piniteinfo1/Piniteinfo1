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
Route::group(['middleware' => ['jwt.verify']], function() {
Route::get('/check', [App\Http\Controllers\ApiController::class, 'check']);
Route::get('/logout', [App\Http\Controllers\ApiController::class, 'logout']);
});