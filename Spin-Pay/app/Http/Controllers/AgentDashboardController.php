<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\UserData;
Use App\Models\UserDocument;
use App\Models\Requests;
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
                    ->select('users.id','users.name','users.email','users.phone','users.role_id','users.created_at','user_datas.age' ,'user_datas.gender',
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
            $payslip1 = UserDocument::where('user_id',$req)->where('master_document_id',3)->where('document_number',31)->select('master_document_id','document_number','document_image','is_verified')->get()->first();
            $payslip2 = UserDocument::where('user_id',$req)->where('master_document_id',3)->where('document_number',32)->select('master_document_id','document_number','document_image','is_verified')->get()->first();
            $payslip3 = UserDocument::where('user_id',$req)->where('master_document_id',3)->where('document_number',33)->select('master_document_id','document_number','document_image','is_verified')->get()->first();
            
            if(!$bankslip){
                return response()->json([
                    'aadhar_image'=>$aadhar->document_image,
                    'aadhar_num'=>$aadhar->document_number,
                    'isAdhrVer'=>$aadhar->is_verified,
                    'pan_image'=>$pan->document_image,
                    'pan_num'=>$pan->document_number,
                    'isPanVer'=>$pan->is_verified,
                    'bankslip_image'=>"",
                    'bankslip_num'=>"",
                    'isBsVer'=>"",
                ]); 
            }
            if(!$aadhar){
                return response()->json([
                    'aadhar_image'=>"",
                'aadhar_num'=>"",
                'isAdhrVer'=>"",
                'pan_image'=>$pan->document_image,
                'pan_num'=>$pan->document_number,
                'isPanVer'=>$pan->is_verified,
                'bankslip_image'=>$bankslip->document_image,
                'bankslip_num'=>$bankslip->document_number,
                'isBsVer'=>$bankslip->is_verified,
                ]); 
            }
            if(!$pan){
                return response()->json([
                    'aadhar_image'=>$aadhar->document_image,
                    'aadhar_num'=>$aadhar->document_number,
                    'isAdhrVer'=>$aadhar->is_verified,
                    'pan_image'=>"",
                    'pan_num'=>"",
                    'isPanVer'=>"",
                    'bankslip_image'=>$bankslip->document_image,
                    'bankslip_num'=>$bankslip->document_number,
                    'isBsVer'=>$bankslip->is_verified,
                ]); 
            }
            // if(!$payslip1){
            //     return response()->json([
            //         'aadhar_image'=>$aadhar->document_image,
            //         'aadhar_num'=>$aadhar->document_number,
            //         'isAdhrVer'=>$aadhar->is_verified,
            //         'pan_image'=>"",
            //         'pan_num'=>"",
            //         'isPanVer'=>"",
            //         'bankslip_image'=>$bankslip->document_image,
            //         'bankslip_num'=>$bankslip->document_number,
            //         'isBsVer'=>$bankslip->is_verified,
            //     ]); 
            // }
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
                // 'paySlip1'=>[$payslip1->document_image,$payslip1->is_verified],
                // 'paySlip1'=>$payslip1->is_verified,
                // 'paySlip2'=>$payslip2->document_image,
                // 'paySlip2'=>$payslip2->is_verified,
                // 'paySlip3'=>$payslip3->document_image,
                // 'paySlip3'=>$payslip3->is_verified,
            ]);
        }
        catch(QueryException $e){
            return response()->json([
                'message' => 'Internal Server Error',
                "status" => 500
            ]);
        }
       
    }

    public function DocAprv(Request $req){
        try{
            $query = UserDocument::where('user_id', $req['user_id'])
                          ->where('master_document_id',$req['doc_id'])
                          ->update(['is_verified' => $req['request_type']]);
            if($query)
            return response()->json([
                'message' => 'success',
                "status" => 200
            ]);
            else
            return response()->json([
                'message' => 'failed',
                "status" => 400
            ]);
        }
        catch(QueryException $e){
            return response()->json([
                'message' => 'Internal Server Error',
                "status" => 500
            ]);
        } 

    }

    public function CheckLoanRequest(Request $req){
        try{
            $query = Requests::where('user_id',$req['id'])
                    ->wherebetween(DB::raw('DATE(`created_at`)'), [$req['st'], $req['en']])
                    ->select('amount', 'status', 'tenure', 'created_at', 'updated_at');
    
    
            if($req['status'] == 'all'){
                $query = $query->get();
                return $query;
            }
            else if($req['status'] == 'pending'){
                $query = $query->where('status', $req['status'])->get();
                return $query;
            }
            else if($req['status'] == 'approved'){
                $query = $query->where('status', $req['status'])->get();
                return $query;
            }
            else{
                $query = $query->where('status', $req['status'])->get();
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
