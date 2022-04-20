<?php

namespace App\Http\Controllers;

use App\Mail\SendOtp;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Mail;
use App\Models\OtpVerification;
use Exception;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\UserController;

class Mailes extends Controller
{
    public function sendotp(Request $request)
    {   
        $validate=Validator::make($request->all(),[
        'name'=>'required',
        'email'=>'required|email',
        'phone'=>'required|numeric',
        'password'=>'required',
        "password_confirmation"=>"required|same:password",
        'role_id'=>'required'
    ]);

    if($validate->fails()){
        return response()->json([
            'message' => $validate->errors(),
            'status' => 406,
        ]); }
    else{
        try{
            $users=new Users();
            if($users->where('email',$request['email'])->get()->first()){
                return response()->json([
                    'message' => 'this email is already registered with us, please login.',
                    'status'=> 400,
                ]);
            }
            else{
                $usermail = $request['email'];
                $otp = random_int(1111,9999);
                try{
                    $otptable = new OtpVerification();
                    if($isPresent = $otptable->where('email',$usermail)->get()->first()){
                        $isPresent->otp = $otp;
                        $isPresent->otp_sent_time = \Carbon\Carbon::now();
                        $isPresent->save();
                    }
                    else{
                        $otptable->email = $usermail;
                        $otptable->otp_sent_time = \Carbon\Carbon::now();
                        $otptable->otp = $otp;
                        $otptable->save();
                    }
                    try{
                        Mail::to($usermail)->send(new SendOtp($otp));
                        return response()->json([
                            'message' => 'otp sent.',
                            'status'=> 200,
                        ]);
                    }
                    catch(\Exception $e){
                        return response()->json([
                            'message' => 'Oops, we faced some technical issue, please try again after sometime',
                            'status'=> 500,
                        ]);
                    }
                }
                catch(QueryException $e){
                    return response()->json([
                        'message' => 'Oops, we faced some technical issue, please try again after sometime',
                        "status" => 500,
                    ]);
                }
               
            } 
        }
        catch(QueryException $e){
            return response()->json([
                'message' => 'Oops, we faced some technical issue, please try again after sometime',
                "status" => 500
            ]);
        }
           
    }
    }

    public function verifyotp(Request $request){
        $validate=Validator::make($request->all(),[
            'userOtp'=> 'required|numeric',
        ]);
        
        if($validate->fails()){
            return response()->json([
                'message' => $validate->errors(),
                'status' => 406,
            ]); }
        else{
            try{
                
                $usermail = $request['email'];
                $userOtp = $request['userOtp'];
                $otpVerTbl = new OtpVerification();
                if($isPresent = $otpVerTbl->where('email',$usermail)->get()->first()){
                    $otpFrmTbl = $isPresent->otp;
                    $otpSentTime = $isPresent->otp_sent_time;
                    $timeNow = \Carbon\Carbon::now();
                    $diffInTime = $timeNow->diffInMinutes($otpSentTime);
                    if($diffInTime > 10){
                        return response()->json([
                            'message' => 'otp expired, please try again',
                            "status" => 400
                        ]);
                    }
                    else{
                        if($otpFrmTbl==$userOtp){
                            $userControllerObj = new UserController();
                            $responseFromStoreUserData = $userControllerObj->store_users($request);
                            return $responseFromStoreUserData;
                        }
                        else{
                            return response()->json([
                                'message' => 'wrong otp, please enter correct otp',
                                "status" => 400
                            ]);
                        }
                    }
                    
                    
                }
                else{
                    return response()->json([
                        'message' => 'Oops , something went wrong, try after sometime.',
                        "status" => 400
                    ]);
                }
            }
            catch(Exception $e){
                return response()->json([
                    'message' => 'Oops , something went wrong, try after sometime.',
                    "status" => 500
                ]);
            }


        }
    }
    
    public function test1(Request $request){
        echo '<pre>';
        $val = $request->cookie('access_token');
        var_dump($val);
    }
    
}
