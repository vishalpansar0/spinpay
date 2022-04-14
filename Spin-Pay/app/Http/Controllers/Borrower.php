<?php

namespace App\Http\Controllers;

use App\Models\CreditDetail;
use App\Models\Requests;
use App\Models\Loan;
use App\Models\Transaction;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Borrower extends Controller
{
    // Loan Request
    public function loan_request(Request $request)
    {
        $loanRequest = new Requests();
        try {

            $validator = Validator::make($request->all(), [
                'user_id' => 'required',
                'amount_request' => 'required',
                'tenure' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'Validation Failed' => $validator->errors(),
                    'status' => 400,
                ]);
            } else {
                if ($request->tenure > 3) {
                    return response()->json([
                        'message' => 'tenure greater than three Months',
                        'status' => 400,
                    ]);
                }
                $creditDetails = new CreditDetail();
                $details = $creditDetails->where('user_id', $request['user_id'])->get();
                if ($details[0]->credit_limit < $request['amount_request']) {
                    return response()->json([
                        'message' => "Requested Amount Greater Than Assigned Credit Limit",
                        'status' => 400,
                    ]);
                } else {
                    $loanRequest->user_id = $request->user_id;
                    $loanRequest->amount_request = $request->amount_request;
                    $loanRequest->tenure = $request->tenure;
                    $isSaved = $loanRequest->save();
                    if ($isSaved == 1) {
                        return response()->json([
                            'message' => 'success',
                            "status" => 200,
                            "id" => $loanRequest->id,
                        ]);
                    }
                    return response()->json([
                        'message' => 'Data Not Saved',
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

    // All Loan Request
    public function all_requests(Request $request)
    {
        $loanRequest = new Requests();
        try {

            $validator = Validator::make($request->all(), [
                'user_id' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'Validation Failed' => $validator->errors(),
                    'status' => 400,
                ]);
            } else {
                $loanRequest = new Requests();
                $details = $loanRequest->where('user_id', $request['user_id'])->get();
                return response()->json([
                    'message' => $details,
                    "status" => 400,
                ]);

            }
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Internal Server Error',
                "status" => 500,
            ]);
        }
    }

    // Fetching Loan data
    public function loan_details(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'user_id' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'Validation Failed' => $validator->errors(),
                    'status' => 400,
                ]);
            }

            $loan = new Loan();
            $loandetails = $loan->where('request_id',[$request['user_id']])->get();
            return response()->json([
                'message'=>$loandetails,
                'status'=>200
            ]);    

        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Internal Server Error',
                "status" => 500,
            ]);
        }
    }


    // All transaction
    public function all_transactions(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'user_id' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'Validation Failed' => $validator->errors(),
                    'status' => 400,
                ]);
            }

            $transaction = new Transaction();
            $transactiondetails = $transaction->where('from_id',[$request['user_id']])->get();
            return response()->json([
                'message'=>$transactiondetails,
                'status'=>200
            ]);    

        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Internal Server Error',
                "status" => 500,
            ]);
        }
    }
}
