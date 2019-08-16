<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    //
    public function register(Request $request) {

       $admin = new Admin();
       $admin->first_name = $request->input('first_name');
       $admin->last_name = $request->input('last_name');
       $admin->email_address = $request->input('email_address');
       $admin->password = $request->input('password');
       $admin->user_name= $request->input('user_name');
       $admin->address= $request->input('address');
       $admin->contact_no = $request->input('contact_no');
       $saveAdmin = $admin->save();
       if($saveAdmin) {
        return response()->json(['output' => 'success' , 'message' => 'Admin Registration Successful']);
       } else {
        return response()->json(['output' => 'error' , 'message' => 'Something went wrong during register the user']);
       }
    }
    

    public function login(Request $request) {
        $emailAddress = $request->input('email_address');
        $password = $request->input('password');
  
        $admin = Admin::where('email_address', '=', $emailAddress)
                        ->where('password', '=', $password);
        
        if($admin->count() >= 1) {
          $getAdmin = $admin->first();
  
          $token = Str::random(90).'.'. $getAdmin->id . microtime(true);
          $getAdmin = Admin::find($getAdmin->id);
          $getAdmin->admin_token = hash('sha256', $token);
          $updateAdmin = $getAdmin->save();
  
          if($updateAdmin) {
            $getReturnAdmin = Admin::find($getAdmin->id);
            return response()->json(['output' => 'success',  'admin' => $getReturnAdmin , 'message' => 'Merchant Operator login Successfully']);
          } else {
            return response()->json(['output' => 'error', 'admin' => '', 'message' => 'Something when wrong During login into system']);
          }
          // generate token for front end api
          // Save the session for protected the api in server
        } else {
          //show the message return
          return response()->json(['output' => 'error', 'admin' => '', 'message' => 'Wrong Email address or Password']);
        }
    }
}
