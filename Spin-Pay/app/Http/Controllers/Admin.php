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
use Illuminate\Support\Facades\Hash;
use App\Models\CreditDetail;
use Illuminate\Support\Facades\Session;
use DB;
use Illuminate\Database\QueryException;

class Admin extends Controller
{
    //
    public function getAllUsers(){
        return view('admin.adminview', [
            'users' => DB::table('users')->wherein('role_id',[3,4])->paginate(15),
        ]);
    }
    public function getAllTransactions(){
        return view('admin.allTransactions', [
            'trans' => DB::table('transactions')->paginate(15),
        ]);
    }
    public function getAllLoans(){
        return view('admin.allLoans', [
            'loans' => DB::table('loans')->paginate(15),
        ]);
    }

    public function login(Request $req){
        $validated = $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if($req['email']=='admin@spinpay.com'){
            if($req['password']=='admin@123'){
                $req->session()->put('admin_id','1');
                return redirect('/admin/dashboard');
            }else{
                return back()->with('failed','password does not match!');
            }
            
        }else{
            return back()->with('failed','email does not match!');
        }
        $req->session()->put('admin_id',$admin->id);
        return redirect('/admin/dashboard');
    }

    public function logout(){
        Session::forget('admin_id');
        return redirect('admin/signin');
    }

    public function addAgent(Request $request){
        $users = new Users();
        try {
            if ($users->where('email', $request['email'])->get()->first()) {
                return response()->json([
                    'message' => 'this email is already registered!',
                    'status' => 400,
                ]);
            } else {
                $users->name = $request['name'];
                $users->email = $request['email'];
                $users->phone = $request['phone'];
                $users->password = Hash::make($request['password']);
                $users->role_id = $request['role_id'];
                $ifsaved = $users->save();
                if ($ifsaved == 1) {
                    return response()->json([
                        'message' => 'success',
                        "status" => 200,
                        "id" => $users->id,
                    ]);
                } else {
                    return response()->json([
                        'message' => 'data not saved',
                        "status" => 400,
                    ]);
                }
            }
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Internal Server Error',
                "status" => 500,
            ]);
        }
    }
}
