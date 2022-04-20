<?php

use App\Http\Controllers\Mailes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Borrower;
use App\Http\Controllers\Lender;
use App\Http\Controllers\AgentDashboardController;


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

//auth routes
Route::post('login',[AuthController::class,'login']);

// for send otp to users mail
Route::post('sendotp',[Mailes::class,"sendotp"]);

//for verify otp entered by user
Route::post('/verifyotp',[Mailes::class,"verifyotp"]);

//for to store basic user details
Route::post("store_users",[UserController::class,"store_users"])->middleware('auth:api');
Route::post('/userdata', [UserController::class, 'userdata']);
Route::post('/aadhar', [UserController::class, 'aadhar']);

//for to store pancard push
Route::post('pancard',[UserController::class, 'pancard']);

// to store payslip details
Route::post('payslip',[UserController::class,'payslip']);

// to store bankstate details
Route::post('bankstatement',[UserController::class,'bankstatement']);

//Loan Request
Route::post('request/loan',[Borrower::class,'loan_request']);

//All Loan Request
Route::post('request/allrequest',[Borrower::class,'all_requests']);

//Get loan details
Route::post('request/loandetails',[Borrower::class,'loan_details']);

//Get Transactions details
Route::post('request/transactiondetails',[Borrower::class,'all_transactions']);

//Get All Borrowers and Lenders with date and status filter
Route::post('AllLenRoBorr',[AgentDashboardController::class,'AllLenRoBorr']);

//Get users details from agentdashboard
Route::get('ShowUsersDetails',[AgentDashboardController::class,'ShowUsersDetails']);

//Document approve form agentdashboard
Route::post('DocAprv',[AgentDashboardController::class,'DocAprv']);

//get loan request of a users
Route::get('CheckLoanRequest',[AgentDashboardController::class,'CheckLoanRequest']);

// Change Password
Route::post('changepassword',[UserController::class,'Change_password']);


// Forgot Password
Route::post('forgotpassword',[UserController::class,'Forgot_Password']);





// Add Money To Lender Wallet
Route::post('addmoney',[Lender::class,'Add_money']);

// Approve loan
Route::post('approveloan',[Lender::class,'Approve_loan']);