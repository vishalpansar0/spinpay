<?php

use App\Http\Controllers\Mailes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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

// for send otp to users mail
Route::post('sendotp',[Mailes::class,"sendotp"]);

//for to store basic user details
Route::post("store_users",[UserController::class,"store_users"]);
Route::post('/userdata', [UserController::class, 'userdata']);
Route::post('/aadhar', [UserController::class, 'aadhar']);

//for to store pancard details
Route::post('pancard',[UserController::class, 'pancard']);

// to store payslip details
Route::post('payslip',[UserController::class,'payslip']);

// to store bankstate details
Route::post('bankstatement',[UserController::class,'bankstatement']);
