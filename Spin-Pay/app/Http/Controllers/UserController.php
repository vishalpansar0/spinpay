<?php

namespace App\Http\Controllers;

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
        print_r("inserted successfuly");
    }

    public function userdata(Request $request,$id){
            $validator = Validator::make($request->all(), [
                'address_line' => 'required',
                'city' => 'required',
                'state' => 'required',
                'age' => 'required',
                'gender' => 'required',
                'dob' => 'required',
                'image' => 'required'
                ]);

                if($validator->fails()) {
                    $flag = false;
                    return $data['message']['statusText'] = "Validation Failed ".$validator->errors();
                    } else {
                            $user= new UserData();
                            $user->user_id= $request['id'];
                            $user->address_line= $request['address_line'];
                            $user->city= $request['city'];
                            $user->state= $request['state'];
                            $user->age= $request['age'];
                            $user->gender= $request['gender'];
                            $user->dob= $request['dob'];
                            $user->image= $request['image'];
                            $user->save();
                            return "Success";
                        }
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
                return $data['message']['statusText'] = "Validation Failed ".$validator->errors();
                } else {
                        $user = new UserDocument();
                        $user->user_id = $request['user_id'];
                        $user->master_document_id = $request ['master_document_id'];
                        $user->document_number= $request['document_number'];
                        $user->document_image= $request['document_image'];
                        $user->save();
                        return "Success";
                    }  
       }
}
