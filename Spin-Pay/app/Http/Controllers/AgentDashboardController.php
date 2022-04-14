<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\UserData;
use DB;
use Illuminate\Database\QueryException;

class AgentDashboardController extends Controller
{
    public function AllLenRoBorr(Request $req){
        try{
            $query = Users::wherebetween(DB::raw('DATE(users.created_at)'), [$req['st'], $req['en']])
                ->leftjoin('user_datas','user_datas.user_id','users.id')
                ->select('users.name', 'users.email', 'users.phone', 'users.role_id', 'users.email_verified');

            if($req['id'] == 0){
                $query = $query->wherein('role_id',[3,4]);
            }
            else if($req['id'] == 3){
                $query = $query->where('role_id', $req['id']);
            }

            else{
                $query = $query->where('role_id', $req['id']);
            }
            
            if($req['status'] == "all"){
                $query=$query->get();
                return $query;
            }
            else{
                $query = $query->where('user_datas.status',$req['status'])->get();
                return $query;
            }
        }
        catch(QueryException $e){
            return response()->json([
                'message' => 'Internal Server Error',
                "status" => 500
            ]);
        }
        
    }
}
