<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Merchant;
use App\Models\Operator;
use App\Models\PaymentDetails;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Str;

class SiteController extends Controller
{
    public function index() {
        return view('app');
    }

    public function register (Request $request) {
      
      /* save in merchant table */
       $merchant = new Merchant;
       $merchant->merchant_name = $request->input('merchant_name');
       $merchant->merchant_number =  $request->input('merchant_number');
       $merchant->merchant_email = $request->input('merchant_email');
     
       $merchant->merchant_identification_type =  $request->input('merchant_identification_type');
       $merchant->merchant_identification_number = $request->input('merchant_identification_number');
       $merchant->business_name =  $request->input('business_name');
       $merchant->media_link =  $request->input('media_link');
       $merchant->address = $request->input('address');

       if($request->hasFile('merchant_identification_image_1')) {
      
          $file = $request->file("merchant_identification_image_1");
          $name = "merchant_" . "_". $file->getClientOriginalName();     
          $file->move(public_path().'/uploads/images/ids/', $name);
          $merchant->merchant_identification_image_1 = $name;
         
       }

       if($request->hasFile('merchant_identification_image_2')) {
          $file = $request->file("merchant_identification_image_2");
          $name = "merchant_" . "_". $file->getClientOriginalName();     
          $file->move(public_path().'/uploads/images/ids/', $name);
          $merchant->merchant_identification_image_2 = $name;
       }

       if($request->hasFile('profile_image')) {
        $file = $request->file("profile_image");
        $name = "merchant_" . "_". $file->getClientOriginalName();     
        $file->move(public_path().'/uploads/images/merchants/', $name);
        $merchant->profile_image = $name;
       }

       $saveMerchant = $merchant->save();
      
       /* save in merchant table */

        /* save in operator table */
       $merchant_id = $merchant->id;
       $operator = new Operator;
       $operator->merchant_id = $merchant_id;
       $operator->operator_name = $request->input('operator_name');
       $operator->operator_email = $request->input('operator_email');
       $operator->operator_number = $request->input('operator_number');
       $operator->operator_password = $request->input('operator_password');
       $saveOperator = $operator->save();
  /* save in operator table */
         $payment_details = new PaymentDetails;
         $payment_details->merchant_id = $merchant_id;
        /* save in payment details table **/
       if($request->input('payment_type') == 'mobile') {
          $payment_details->payment_type = $request->input('payment_type');
          $payment_details->payment_provider_id =  $request->input('payment_provider_id');
          $payment_details->mobile_account_number =  $request->input('mobile_account_number');
          $payment_details->mobile_account_name =  $request->input('mobile_account_name');
       } else {
          $payment_details->payment_type =  $request->input('payment_type');
          $payment_details->payment_provider_id =  $request->input('payment_provider_id');
          $payment_details->account_type_id =  $request->input('account_type_id');
          $payment_details->bank_holder_name =  $request->input('bank_holder_name');
          $payment_details->bank_wallet_number =  $request->input('bank_wallet_number');
          $payment_details->bank_branch_name =  $request->input('bank_branch_name');
          $payment_details->bank_routing_number =  $request->input('bank_routing_number');
       }

       $savePaymentDetails = $payment_details->save();
       if($saveMerchant && $saveOperator && $savePaymentDetails) {
         return response()->json(['output' => 'success', 'message' => 'Merchant Registration complete Successfully']);
       } else {
        return response()->json(['output' => 'error', 'message' => 'Something went wrong during complete Registration']);
       }
      /* save in payment details table **/
    }

    public function login (Request $request) {
      $emailAddress = $request->input('email_address');
      $password = $request->input('password');

      $operator = Operator::where('operator_email', '=', $emailAddress)
                      ->where('operator_password', '=', $password);
      
      if($operator->count() >= 1) {
        $getOperator = $operator->first();

        $token = Str::random(60).'.'. $getOperator->id . microtime(true);
        $saveOperator = Operator::find($getOperator->id);
        $saveOperator->api_token = hash('sha256', $token);
        $updateOperator = $saveOperator->save();

        if($updateOperator) {
          $getReturnOperator = Operator::find($getOperator->id);
          return response()->json(['output' => 'success',  'operator' => $getReturnOperator , 'message' => 'Merchant Operator login Successfully']);
        } else {
          return response()->json(['output' => 'error', 'operator' => '', 'message' => 'Something when wrong During login into system']);
        }
        // generate token for front end api
        // Save the session for protected the api in server
      } else {
        //show the message return
        return response()->json(['output' => 'error', 'operator' => '', 'message' => 'Wrong Email address or Password']);
      }
    }

    public function logout(Request $request) {
      // Remove the session
        $saveOperator = Operator::where($request->input('api_token'))->first();
        $saveOperator->api_token = '';
        $updateOperator = $saveOperator->save();
        if($updateOperator) {
          return response()->json(['output' => 'success', 'message' => 'Operator Logout successfully']);
        }
      // Remove the token
    }
}
