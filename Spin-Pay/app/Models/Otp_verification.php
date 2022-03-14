<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otp_verification extends Model
{
    use HasFactory;
    protected $table = 'otp_verification';
    protected $primaryKey = 'id';
}
