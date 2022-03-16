<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use App\Models\UserData;
use Illuminate\Support\Facades\Validator;
use App\Models\UserDocument;

class UserController extends Controller
{
    public function store_users(Request $request){
        $validate=$request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'password'=>'required',
            "password_confirmation"=>"required|same:password",
            'role_id'=>'required'
        ]);

        $users=new Users();
        $users->name=$request['name'];
        $users->email=$request['email'];
        $users->phone=$request['phone'];
        $users->password=Hash::make($request['password']);
        $users->role_id=$request['role_id'];
        $users->save();
        return response()->json([
            'msg' => 'success',
        ]);
    }

    public function userdata(Request $request,$id){
            $validator = Validator::make($request->all(), [
                'address_line' => 'required',
                'city' => 'required',
                'state' => 'required',
                'pincode' => 'required',
                'age' => 'required',
                'gender' => 'required',
                'dob' => 'required',
                'image' => 'required'
                ]);

                if($validator->fails()) {
                    $flag = false;
                    return response()->json([
                        'Validation Failed' => $validator->errors(),
                        'status' => 400
                    ]);
                    } else {
                            $size = $request->file('image')->getSize();
                            if($size > 100000){
                                return response()->json([
                                    'Upload Failed' => 'Photos must be less then 100kB',
                                    'status' => 400
                                ]);
                            }
                            try{ 
                                    $user= new UserData();
                                    $user->user_id= $request['id'];
                                    $user->address_line= $request['address_line'];
                                    $user->city= $request['city'];
                                    $user->state= $request['state'];
                                    $user->pincode= $request['pincode'];
                                    $user->age= $request['age'];
                                    $user->gender= $request['gender'];
                                    $user->dob= $request['dob'];
                                    $path = $request->file('image')->store('public/images/profileImage');
                                    $user->image= $path;
                                    $isSaved = $user->save();
                                    if($isSaved == 1){
                                        return response()->json([
                                            'message' => 'success',
                                            'status' => 200
                                        ]);
                                    }
                                    else{
                                        return response()->json([
                                            'message' => 'Data not Saved',
                                            'status' => 400
                                        ]);
                                    }
                                } catch(QueryException $e){
                                return response()->json([
                                    'Upload Failed' => 'Server Error Please try later',
                                    'status' => 400
                                ]);
                        }         }
       }

       public function aadhar(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'master_document_id' =>'required',
            'document_number' => 'required',
            'document_image' => 'required'  
            ]);
            if($validator->fails()) {
                $flag = false;
                return response()->json([
                    'Validation Failed' => $validator->errors(),
                    'status' => 400
                ]);
                } else {
                        $size = $request->file('document_image')->getSize();
                        if($size > 300000){
                            return response()->json([
                                'Upload Failed' => 'Photos must be less then 100kB',
                                'status' => 400
                            ]);
                        }
                        try{ 
                                $user = new UserDocument();
                                $user->user_id = $request['user_id'];
                                $user->master_document_id = $request ['master_document_id'];
                                $user->document_number= $request['document_number'];
                                $path= $request->file('document_image')->store('public/images/documentImage');
                                $user->document_image= $path;
                                $isSaved = $user->save();
                                if($isSaved == 1){
                                    return response()->json([
                                        'message' => 'success',
                                        'status' => 200
                                    ]);
                                }
                                else{
                                    return response()->json([
                                        'message' => 'Data not Saved',
                                        'status' => 400
                                    ]);
                                }
                                
                        }  catch(QueryException $e){
                                return response()->json([
                                    'Upload Failed' => 'Server Error Please try later',
                                    'status' => 400
                                ]);
                        }
                    }  
       }
}
