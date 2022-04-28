<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\UserData;
Use App\Models\UserDocument;
use App\Models\Requests;
use App\Models\Transaction;
use App\Models\CreditMapping;
use App\Models\CreditDetail;
use DB;
use Illuminate\Database\QueryException;

class AgentDashboardController extends Controller
{
    public function getAllUsers(){
        return view('agent.dashboard', [
            'users' => DB::table('users')->wherein('role_id',[3,4])->paginate(15),
        ]);
    }

    public function AllLenRoBorr(Request $req){
        try{
            $query = Users::wherebetween(DB::raw('DATE(users.created_at)'), [$req['fromDate'], $req['toDate']])
                ->leftjoin('user_datas','user_datas.user_id','users.id')
                ->select('users.name', 'users.email', 'users.phone', 'users.role_id', 'users.email_verified');

            if($req['role'] == 0){
                $query = $query->wherein('role_id',[3,4]);
            }
            else if($req['role'] == 3){
                $query = $query->where('role_id', $req['role']);
            }

            else{
                $query = $query->where('role_id', $req['role']);
            }
            if($req['searchInput']!=""){
                // $query = $query->where('name', 'like', '%' . $req['searchInput'] . '%');

                $query = $query->where('name', 'LIKE', "%{$req['searchInput']}%");
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

    public function ShowUsersDetails($req){
        try{
            $basicInfo = Users::where('users.id',$req)
                    ->leftjoin('user_datas', 'user_datas.user_id', '=', 'users.id')
                    ->leftjoin('credit_details', 'credit_details.user_id', '=', 'users.id')
                    ->select('users.name','users.email','users.phone','users.role_id','users.created_at','user_datas.age' ,'user_datas.gender',
                    'user_datas.dob','user_datas.status','user_datas.image','user_datas.address_line','user_datas.city','user_datas.state'
                    ,'user_datas.pincode','credit_details.credit_limit','credit_details.credit_score')
                    ->first();

            // $docs = Users::where('users.id',$req)
            //             ->leftjoin('user_documents', 'user_documents.user_id', '=', 'users.id')
            //             ->select('user_documents.master_document_id','user_documents.document_number','user_documents.document_image','user_documents.is_verified')
            //             ->get();

           
            // echo '<pre>';
            // print_r($aadhar->document_image);
            return view('agent.userview', ['user' => $basicInfo]);
        }
        catch(QueryException $e){
            return response()->json([
                'message' => $e,
                "status" => 500
            ]);
        } 
    }

    public function fetchUserDocs($req){
        try{
            $aadhar = UserDocument::where('user_id',$req)->where('master_document_id',1)->select('master_document_id','document_number','document_image','is_verified')->get()->first();
            $pan = UserDocument::where('user_id',$req)->where('master_document_id',2)->select('master_document_id','document_number','document_image','is_verified')->get()->first();
            $bankslip = UserDocument::where('user_id',$req)->where('master_document_id',4)->select('master_document_id','document_number','document_image','is_verified')->get()->first();
            return response()->json([
                'aadhar_image'=>$aadhar->document_image,
                'aadhar_num'=>$aadhar->document_number,
                'isAdhrVer'=>$aadhar->is_verified,
                'pan_image'=>$pan->document_image,
                'pan_num'=>$pan->document_number,
                'isPanVer'=>$pan->is_verified,
                'bankslip_image'=>$bankslip->document_image,
                'bankslip_num'=>$bankslip->document_number,
                'isBsVer'=>$bankslip->is_verified,
            ]);
        }
        catch(QueryException $e){
            return response()->json([
                'message' => $e,
                "status" => 500
            ]);
        } 
        
        
    }

    public function DocAprv(Request $req){
        try{
            $query = UserDocument::where('user_id', $req['user_id'])
                          ->where('master_document_id',$req['master_document_id'])
                          ->update(['is_verified' => $req['is_verified']]);
            if($query)
                return "success";
            else
                return "failed";
        }
        catch(QueryException $e){
            return response()->json([
                'message' => 'Internal Server Error',
                "status" => 500
            ]);
        } 

    }


    public function allTransaction(){
        return view('agent.transaction', [
            'transaction' => Transaction::select('transactions.id as id','s.name as from', 'ss.name as to', 'transactions.type as type', 'transactions.amount as amount',
                                            'transactions.status as status', 'transactions.created_at as time', 'transactions.created_at as date')
                                            ->leftjoin('users as s', 's.id', 'transactions.from_id')
                                            ->leftjoin('users as ss', 'ss.id', 'transactions.to_id')->get()
        ]);
    }

    public function transaction(Request $request){
        $data = Transaction::select('transactions.id as id','s.name as from', 'ss.name as to', 'transactions.type as type', 'transactions.amount as amount',
                                     'transactions.status as status', 'transactions.created_at as time', 'transactions.created_at as date')
                            ->leftjoin('users as s', 's.id', 'transactions.from_id')
                            ->leftjoin('users as ss', 'ss.id', 'transactions.to_id');
        if($request['type'] == 'all'){
            $data = $data;
        }
        else{
            $data = $data->where('type', $request['type']);
        }
        if($request['id'] != null){
            $data->where('from_id' ,$request['id'])->orwhere('to_id', $request['id']);
        }
        if($request['fromdate'] != null && $request['todate'] !=null){
            $data->wherebetween(DB::raw('DATE(transactions.created_at)'), [$request['fromdate'], $request['todate']]);
        }
        if($request['status'] == "successfull" || $request['status'] == "failed"){
            $data->where('status', $request['status']);
        }
        return $data->get();
    }

    public function request(){
        return view('agent.request',[
            'requests' => Requests::all(),
        ]);
    }

    public function filterRequest(Request $req){
        try{
            $query = Requests::select('id','user_id','amount', 'status', 'tenure', 'created_at', 'updated_at');
            
            if($req['user_id'] != null){
                $query->where('user_id', $req['user_id']);
            }
            if($req['fromdate'] != null && $req['todate'] != null){
                $query = $query
                ->wherebetween(DB::raw('DATE(`created_at`)'), [$req['fromdate'], $req['todate']]);
            }   
            if($req['status'] == 'all'){
                $query = $query;
            }
            else{
                $query = $query->where('status', $req['status']);
            }
            return $query->get();
        }
        catch(QueryException $e){
            return response()->json([
                'message' => 'Internal Server Error',
                "status" => 500
            ]);
        }
    }

    public function creditScoreAndLimit(Request $request){
        try{
            $salary = round($request->salary/2);
            $credit_score = round(300+($salary/84));
            // $query = CreditMapping::where('credit_score_from' , '<=', $credit_score)
            //                 ->where('credit_score_to', '>=', $credit_score)
            //                 ->select('credit_limit')->first();
    
    
            // return response()->json([
            //     'query' => $query,
            //     'score' => $credit_score
            // ]);
    
            
            $credit_limit = 0;
            if($credit_score >= 300 && $credit_score <= 400){
                $credit_limit = 1000;
            }
            else if($credit_score >= 401 && $credit_score <= 500){
                $credit_limit = 5000;
            }
            else if($credit_score >= 501 && $credit_score <= 600){
                $credit_limit = 10000;
            }
            else if($credit_score >= 601 && $credit_score <= 700){
                $credit_limit = 20000;
            }
            else if($credit_score >= 701 && $credit_score <= 800){
                $credit_limit = 25000;
            }
            else if($credit_score >= 801 && $credit_score <= 900){
                $credit_limit = 30000;
            }
            
            DB::table('credit_details')
            ->updateOrInsert(
                ['user_id' => $request['user_id']],
                ['credit_limit'=> $credit_limit, 'credit_score'=> $credit_score]
            );
        }
        catch(QueryException $e){
            return response()->json([
                "code" => 500,
                'message' => $e
            ]);
        }
        
    }

    public function profileApprove(Request $request){
        try{
            if(UserDocument::where('user_id',$request['user_id'])->where('master_document_id','1')->where('is_verified','approved')->exists() && 
               UserDocument::where('user_id',$request['user_id'])->where('master_document_id','2')->where('is_verified','approved')->exists() &&
               UserDocument::where('user_id',$request['user_id'])->where('document_number','31')->where('is_verified','approved')->exists() &&
               UserDocument::where('user_id',$request['user_id'])->where('document_number','32')->where('is_verified','approved')->exists() &&
               UserDocument::where('user_id',$request['user_id'])->where('document_number','33')->where('is_verified','approved')->exists() &&
               UserDocument::where('user_id',$request['user_id'])->where('document_number','41')->where('is_verified','approved')->exists()){
                UserData::where('user_id',$request['user_id'])->update(['status' => 'approved']);
                return response()->json([
                    'code' => 200,
                    'message' => "Profile Approved successfully"
                ]);
            }
            return response()->json([
                'code' => 204,
                'message' => "Documents not approved or not uploaded by user"
            ]);
        }
        catch(QueryException $e){
            return response()->json([
                "code" => 500,
                'message' => $e
            ]);
        }
    }

    public function profileReject(Request $request){
        try{
            UserData::where('user_id',$request['user_id'])->update(['status' => 'reject']);
            return response()->json([
                'code' => 200,
                'message' => "Profile Rejected successfully"
            ]);
        }
        catch(QueryException $e){
            return response()->json([
                "code" => 500,
                'message' => $e
            ]);
        }
    }
}
