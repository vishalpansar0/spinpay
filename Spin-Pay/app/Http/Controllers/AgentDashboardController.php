<?php

namespace App\Http\Controllers;

use App\Models\Requests;
use App\Models\UserDocument;
use App\Models\Users;
use DB;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AgentDashboardController extends Controller
{
    public function AllLenRoBorr(Request $req)
    {
        try {
            $query = Users::wherebetween(DB::raw('DATE(users.created_at)'), [$req['st'], $req['en']])
                ->leftjoin('user_datas', 'user_datas.user_id', 'users.id')
                ->select('users.name', 'users.email', 'users.phone', 'users.role_id', 'users.email_verified');

            if ($req['id'] == 0) {
                $query = $query->wherein('role_id', [3, 4]);
            } else if ($req['id'] == 3) {
                $query = $query->where('role_id', $req['id']);
            } else {
                $query = $query->where('role_id', $req['id']);
            }

            if ($req['status'] == "all") {
                $query = $query->get();
                return $query;
            } else {
                $query = $query->where('user_datas.status', $req['status'])->get();
                return $query;
            }
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Internal Server Error',
                "status" => 500,
            ]);
        }

    }

    public function ShowUsersDetails(Request $req)
    {
        try {
            $basicInfo = Users::where('users.id', $req['id'])
                ->leftjoin('user_datas', 'user_datas.user_id', '=', 'users.id')
                ->leftjoin('credit_details', 'credit_details.user_id', '=', 'users.id')
                ->select('users.name', 'users.email', 'users.phone', 'users.role_id', 'user_datas.age', 'user_datas.gender',
                    'user_datas.dob', 'user_datas.image', 'user_datas.address_line', 'user_datas.city', 'user_datas.state'
                    , 'user_datas.pincode', 'credit_details.credit_limit', 'credit_details.credit_score')
                ->first();

            $docs = Users::where('users.id', $req['id'])
                ->leftjoin('user_documents', 'user_documents.user_id', '=', 'users.id')
                ->select('user_documents.master_document_id', 'user_documents.document_number', 'user_documents.document_image', 'user_documents.is_verified')
                ->get();
            return response()->json([
                $basicInfo,
                $docs,
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Internal Server Error',
                "status" => 500,
            ]);
        }
    }

    public function DocAprv(Request $req)
    {
        try {
            $query = UserDocument::where('user_id', $req['user_id'])
                ->where('master_document_id', $req['master_document_id'])
                ->update(['is_verified' => 1]);
            if ($query) {
                return "success";
            } else {
                return "failed";
            }

        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Internal Server Error',
                "status" => 500,
            ]);
        }

    }

    public function CheckLoanRequest(Request $req)
    {
        try {
            $query = Requests::where('user_id', $req['id'])
                ->wherebetween(DB::raw('DATE(`created_at`)'), [$req['st'], $req['en']])
                ->select('amount', 'status', 'tenure', 'created_at', 'updated_at');

            if ($req['status'] == 'all') {
                $query = $query->get();
                return $query;
            } else if ($req['status'] == 'pending') {
                $query = $query->where('status', $req['status'])->get();
                return $query;
            } else if ($req['status'] == 'approved') {
                $query = $query->where('status', $req['status'])->get();
                return $query;
            } else {
                $query = $query->where('status', $req['status'])->get();
                return $query;
            }
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Internal Server Error',
                "status" => 500,
            ]);
        }
    }
}
