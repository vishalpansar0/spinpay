<?php

namespace App\Http\Controllers;

use App\Mail\SendOtp;
use App\Mail\SendOtp2;
use Illuminate\Http\Request;

use App\Models\Otp_verification;
use Illuminate\Support\Facades\Mail;

class Send_email extends Controller
{
    public function sendotp()
    {
        $h = random_int(0000,9999);
        Mail::to('vishalpansar0@gmail.com')->send(new SendOtp($h));
    }
}
