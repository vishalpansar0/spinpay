<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\UserData;
Use App\Models\UserDocument;
use App\Models\Requests;
use App\Models\Transaction;
use App\Models\CreditMapping;
use App\Models\Loan;
use App\Models\CreditDetail;
use DB;
use Illuminate\Database\QueryException;

class Admin extends Controller
{
    //
    public function getAllUsers(){
        return view('admin.adminview', [
            'users' => DB::table('users')->where('role_id',[3,4])->paginate(15),
        ]);
    }
}
