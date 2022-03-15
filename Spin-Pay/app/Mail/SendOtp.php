<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendOtp extends Mailable
{
    use Queueable, SerializesModels;
    protected $otp;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($hi)

    {
        $this->otp = $hi;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        // echo $this->otp;
        return $this->from('cppsecretstools@gmail.com', 'SpinPay')
        ->view('emailtest')->with(['otp'=> $this->otp]);
    }
}
