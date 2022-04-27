<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Requests;
use App\Models\Transaction;
use App\Models\Users;
use App\Models\Wallet;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Lender extends Controller
{
    //Add Money To Wallet
    public function Add_money(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'amount' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'Validation Failed' => $validator->errors(),
                'status' => 401,
            ]);
        }
        $userr = new Users();
        if (!$userr->where('id', $request['lender_id'])->get()->first()) {
            return response()->json([
                'message' => 'user not present',
                'status' => 400,
            ]);
        }
        if ($request['amount'] < 500) {
            return response()->json([
                'message' => "Minimum Amount requested Amount is 500",
                'status' => 400,
            ]);
        }
        try {
            $transaction = new Transaction();
            $transaction->from_id = $request['user_id'];
            $transaction->to_id = 1;
            $transaction->type = 'self';
            $transaction->amount = $request['amount'];
            $transaction->status = 'successfull';
            $isTransactSuccessfull = $transaction->save();
            if ($isTransactSuccessfull) {
                $wallet = new Wallet();
                $userwallet = $wallet->where('user_id', $request['user_id'])->get()->first();
                if ($userwallet) {
                    $newamount = $userwallet->amount + $request['amount'];
                    $isMoneyAdd = $wallet->where('user_id', $request['user_id'])->update(['amount' => $newamount, 'updated_at' => \Carbon\Carbon::now()]);
                } else {
                    $wallet->user_id = $request['user_id'];
                    $wallet->amount = $request['amount'];
                    $isMoneyAdd = $wallet->save();
                }
                if ($isMoneyAdd) {
                    return response()->json([
                        'message' => 'Amount Successfully added',
                        'status' => 200,
                    ]);
                } else {
                    $transaction->status = "failed";
                    return response()->json([
                        'message' => 'Failed to Add Money',
                        'status' => 400,
                    ]);
                }

            } else {
                $transaction->status = "failed";
                return response()->json([
                    'message' => 'Transaction Failed',
                    'status' => 400,
                ]);
            }

        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Internal Server Error',
                "status" => 500,
            ]);
        }
    }

    // Approve Loan
    public function Approve_loan(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'borrower_id' => 'required',
            'lender_id' => 'required',
            'amount_request' => 'required',
            'tenure' => 'required',
            'request_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'Validation Failed' => $validator->errors(),
                'status' => 400,
            ]);
        }
        $user = new Users();
        if (!$user->where('id', $request['lender_id'])->get()->first()) {
            return response()->json([
                'message' => 'user not present',
                'status' => 400,
            ]);
        }
        $loan = new Loan();
        if ($loan->where('borrower_id', $request['borrower_id'])->where('status', 'ongoing')->get()->first()) {
            return response()->json([
                'message' => "One loan going on",
                'status' => 400,
            ]);
        }
        try {
            if ($request->tenure > 5) {
                return response()->json([
                    'message' => 'tenure should not be greater than Five Months',
                    'status' => 400,
                ]);
            }
            $wallet = new Wallet();
            $userdetails = $wallet->where('user_id', $request['lender_id'])->get()->first();
            if ($userdetails->amount < $request['amount_request']) {
                return response()->json([
                    'message' => 'Insufficient Amount',
                    'status' => 400,
                ]);
            }

            $transaction = new Transaction();
            $transaction->from_id = $request['lender_id'];
            $transaction->to_id = $request['borrower_id'];
            $transaction->type = 'deburst';
            $transaction->amount = $request['amount_request'];
            $transaction->status = 'successfull';
            $isTransactSuccessfull = $transaction->save();
            if ($isTransactSuccessfull) {

                // updating wallet balance
                $newbalance = $wallet->where('user_id', $request['lender_id'])->get()->first()->amount;
                $wallet->where('user_id', $request['lender_id'])->update(['amount' => $newbalance - $request['amount_request']]);

                // updating request status from pending to approve
                $userrequests = new Requests();
                $userrequests->where('id', $request['request_id'])->update(['status' => 'approved']);
                $userrequests->where('id', $request['request_id'])->update(['updated_at' => \Carbon\Carbon::now()]);

                // Processing fee depends on loan amount
                $processingFee = ($request['amount_request'] / 500) * 10;

                // Creating entry into loan table
                $loan->request_id = $request['request_id'];
                $loan->borrower_id = $request['borrower_id'];
                $loan->lender_id = $request['lender_id'];
                $loan->interest = 0.05 * $request['amount_request'];
                $loan->processing_fee = $processingFee;
                $loan->late_fee = 20;
                $loan->amount = $request['amount_request'] - $processingFee;
                $loan->sent_transaction_id = $transaction->id;
                $loan->repayment_transaction_id = null;
                $loan->status = 'ongoing';
                $loan->start_date = \Carbon\Carbon::now();
                $loan->end_date = \Carbon\Carbon::now()->addMonths($request['tenure']);

                if ($loan->save()) {
                    return response()->json([
                        'message' => 'Loan Request Approved',
                        'status' => 200,
                    ]);
                } else {
                    $transaction->status = "failed";
                    return response()->json([
                        'message' => 'Transaction Failed ',
                        'status' => 400,
                    ]);
                }

            } else {
                $transaction->status = "failed";
                return response()->json([
                    'message' => 'Transaction Failed ',
                    'status' => 400,
                ]);
            }

        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Internal Server Error',
                "status" => 500,
            ]);
        }

    }

    // Lender all Transactions
    public function lender_transaction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lender_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'Validation Failed' => $validator->errors(),
                'status' => 400,
            ]);
        }
        $user = new Users();
        if (!$user->where('id', $request['lender_id'])->get()->first()) {
            return response()->json([
                'message' => 'user not present',
                'status' => 400,
            ]);
        }

        try {
            $transaction = new Transaction();
            $lenderTfrom = $transaction->where('from_id', $request['lender_id'])->orwhere('to_id', $request['lender_id'])->get();
            return response()->json([
                'message' => $lenderTfrom,
                'status'=>200
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'server error',
                'status' => 500,
            ]);
        }
    }

    // All pending request for lender dashboard
    public function lender_request(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lender_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'Validation Failed' => $validator->errors(),
                'status' => 400,
            ]);
        }
        $user = new Users();
        if (!$user->where('id', $request['lender_id'])->get()->first()) {
            return response()->json([
                'message' => 'user not present',
                'status' => 400,
            ]);
        }

        try {
            $allrequest = new Requests();
            $lenderRequest = $allrequest->where('status', 'pending')->get();
            return response()->json([
                'message' => $lenderRequest,
                'status' => 200,
            ]);

        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Server Error',
                'status' => 500,
            ]);
        }
    }


    // All Loan Details for Lender
    public function lender_loan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lender_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'Validation Failed' => $validator->errors(),
                'status' => 400,
            ]);
        }
        $user = new Users();
        if (!$user->where('id', $request['lender_id'])->get()->first()) {
            return response()->json([
                'message' => 'user not present',
                'status' => 400,
            ]);
        }
        try {
            $allloan = new Loan();
            $lenderloans = $allloan->where('lender_id', $request['lender_id'])->get();
            return response()->json([
                'message' => $lenderloans,
                'status' => 200,
            ]);

        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Server Error',
                'status' => 500,
            ]);
        }
    }

}
