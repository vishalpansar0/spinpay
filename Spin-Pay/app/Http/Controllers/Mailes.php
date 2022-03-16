<?php

namespace App\Http\Controllers;

use App\Mail\SendOtp;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Mail;
use App\Models\OtpVerification;
use Illuminate\Support\Facades\Validator;

class Mailes extends Controller
{
    public function sendotp(Request $request)
    {   
        $validate=Validator::make($request->all(),[
        'emailforotp'=> 'required|email',
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
                $usermail = $request['emailforotp'];
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
                    
                    Mail::to($usermail)->send(new SendOtp($otp));
                    return response()->json([
                        'message' => 'otp sent.',
                        'status'=> 200,
                    ]);
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
}
