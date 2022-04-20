<?php

namespace App\Http\Controllers;

use App\Models\UserData;
use App\Models\UserDocument;
use App\Models\Users;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function store_users(Request $request)
    {
        $users = new Users();
        try {
            if ($users->where('email', $request['email'])->get()->first()) {
                return response()->json([
                    'message' => 'this email is already registered with us, please login.',
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

    public function userdata(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'address_line' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'image' => 'required',
        ]);
        if ($validator->fails()) {
            $flag = false;
            return response()->json([
                'Validation Failed' => $validator->errors(),
                'status' => 400,
            ]);
        } else {
            $size = $request->file('image')->getSize();
            if ($size > 100000) {
                return response()->json([
                    'message' => 'Photos must be less then 100kB',
                    'status' => 400,
                ]);
            }
            try {
                $user = new UserData();
                $user->user_id = $request['user_id'];
                $user->address_line = $request['address_line'];
                $user->city = $request['city'];
                $user->state = $request['state'];
                $user->pincode = $request['pincode'];
                $user->age = $request['age'];
                $user->gender = $request['gender'];
                $user->dob = $request['dob'];
                $path = $request->file('image')->store('public/images/profileImage');
                $user->image = $path;
                $isSaved = $user->save();
                if ($isSaved == 1) {
                    return response()->json([
                        'message' => 'success',
                        'status' => 200,
                        'id' => $user->user_id,
                    ]);
                } else {
                    return response()->json([
                        'message' => 'Data not Saved',
                        'status' => 400,
                    ]);
                }
            } catch (QueryException $e) {
                return response()->json([
                    'message' => 'Server Error Please try later',
                    'status' => 400,
                ]);
            }
        }
    }

    public function pancard(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'user_id' => 'required',
            'master_document_id' => 'required',
            'document_number' => 'required',
            'document_image' => 'required',
        ]);

        if ($validate->fails()) {
            $flag = false;
            return response()->json([
                'Validation Failed' => $validate->errors(),
                "status" => 400,
            ]);
        } else {
            $size = $request->file('document_image')->getsize();
            if ($size > 2000000) {
                return response()->json([
                    "message" => "image size should be less than 100kb",
                    "status" => 400,
                ]);
            }
        }

        try {
            $user_doc = new UserDocument();
            if ($user_doc->where('document_number', $request['document_number'])->get()->first()) {
                return response()->json([
                    'message' => "this document number already exists",
                    'status' => 400,
                ]);
            } else {
                $user_doc->user_id = $request['user_id'];
                $user_doc->master_document_id = $request['master_document_id'];
                $user_doc->document_number = $request['document_number'];
                $path = $request->file('document_image')->store('public/images/pan_images');
                $user_doc->document_image = $path;
                $ifsaved = $user_doc->save();
                if ($ifsaved == 1) {
                    return response()->json([
                        'message' => 'success',
                        "status" => 200,
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

    public function payslip(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'user_id' => 'required',
            'master_document_id' => 'required',
            'document_number' => 'required',
            'document_image' => 'required',
        ]);
        if ($validate->fails()) {
            return response()->json([
                'Validation Failed' => $validate->errors(),
                'status' => 400,
            ]);
        } else {
            try {
                $user_doc = new UserDocument();
                $user_doc->user_id = $request->user_id;
                $user_doc->master_document_id = $request->master_document_id;
                $user_doc->document_number = $request->document_number;
                $path = $request->file('document_image')->store('public/images/documentImage');
                $user_doc->document_image = $path;
                $ifSaved = $user_doc->save();
                // return $ifSaved;
                if ($ifSaved == 1) {
                    return response()->json([
                        'message' => "Successfully saved",
                        'status' => 200,
                    ]);
                } else {
                    return response()->json([
                        'message' => "Data not saved",
                        'status' => 400,
                    ]);
                }
            } catch (QueryException $e) {
                return response()->json([
                    'message' => 'Internal Server Error',
                    'status' => 500,
                ]);
            }
        }
    }

    public function bankstatement(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'user_id' => 'required',
            'master_document_id' => 'required',
            'document_number' => 'required',
            'document_image' => 'required',
        ]);
        if ($validate->fails()) {
            return response()->json([
                'Validation Failed' => $validate->errors(),
                'status' => 400,
            ]);
        } else {
            try {
                $user_doc = new UserDocument();
                $user_doc->user_id = $request->user_id;
                $user_doc->master_document_id = $request->master_document_id;
                $user_doc->document_number = $request->document_number;
                $path = $request->file('document_image')->store('public/images/documentImage');
                $user_doc->document_image = $path;
                $ifSaved = $user_doc->save();
                // return $ifSaved;
                if ($ifSaved == 1) {
                    return response()->json([
                        'message' => "Successfully saved",
                        'status' => 200,
                    ]);
                } else {
                    return response()->json([
                        'message' => "Data not saved",
                        'status' => 400,
                    ]);
                }
            } catch (QueryException $e) {
                return response()->json([
                    'message' => 'Internal Server Error',
                    'status' => 500,
                ]);
            }
        }
    }

    public function aadhar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'master_document_id' => 'required',
            'document_number' => 'required',
            'document_image' => 'required',
        ]);
        if ($validator->fails()) {
            $flag = false;
            return response()->json([
                'Validation Failed' => $validator->errors(),
                'status' => 400,
            ]);
        } else {
            $size = $request->file('document_image')->getSize();
            if ($size > 100000) {
                return response()->json([
                    'Upload Failed' => 'Photos must be less then 100kB',
                    'status' => 400,
                ]);
            }
            try {
                $user = new UserDocument();
                $user->user_id = $request['user_id'];
                $user->master_document_id = $request['master_document_id'];
                $user->document_number = $request['document_number'];
                $path = $request->file('document_image')->store('public/images/documentImage');
                $user->document_image = $path;
                $isSaved = $user->save();
                if ($isSaved == 1) {
                    return response()->json([
                        'message' => 'success',
                        'status' => 200,
                    ]);
                } else {
                    return response()->json([
                        'message' => 'Data not Saved',
                        'status' => 400,
                    ]);
                }
            } catch (QueryException $e) {
                return response()->json([
                    'message' => $e->getMessage(),
                    'status' => 400,
                ]);
            }
        }
    }

    // Change Password
    public function Change_password(Request $request)
    {
        $users = new Users();
        $DBpassword = $users->where('id', $request['id'])->get()->first()->password;
        if (!(Hash::check($request['old_password'], $DBpassword))) {
            return response()->json([
                'message' => 'incorrect old password',
                'status' => 400,
            ]);
        }
        $oldPasswordCheck = (Hash::check($request['old_password'], $DBpassword));
        $newPasswordCheck = (Hash::check($request['new_password'], $DBpassword));
        if ($oldPasswordCheck == $newPasswordCheck) {
            return response()->json([
                'message' => 'old and new password cannot be same',
                'status' => 400,
            ]);
        }
        $result = $users->where('id', $request['id'])->update(array('password' => Hash::make($request['new_password'])));
        if ($result == 1) {
            return response()->json([
                'message' => 'Password changes successfully',
                'status' => 200,
            ]);
        }
        return response()->json([
            'message' => 'password not changed',
            'status' => 400,
        ]);
    }

    // Forgot Password
    public function Forgot_Password(Request $request)
    {
        $users = new Users();
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'new_password' => 'required',
            'confirm_password' => 'required | same:new_password',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'Validation Failed' => $validator->errors(),
                'status' => 400,
            ]);
        }
        if (!($users->where('email', $request['email'])->get()->first())) {
            return response()->json([
                'message' => 'this email is not registered with us, please register.',
                'status' => 400,
            ]);
        }
        try {
            $result = $users->where('email', $request['email'])->update(array('password' => Hash::make($request['new_password'])));
            if ($result == 1) {
                return response()->json([
                    'message' => 'Password changes successfully',
                    'status' => 200,
                ]);
            }
            return response()->json([
                'message' => 'password not changed',
                'status' => 400,
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Oops , something went wrong, try after sometime.',
                "status" => 500
            ]);
        }
    }

}
