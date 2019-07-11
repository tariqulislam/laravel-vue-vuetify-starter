<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index() {
        return view('app');
    }

    public function register (Request $request) {
      
      /* save in merchant table */
       $merchant_name = $request->input('merchant_name');
       $merchant_number =  $request->input('merchant_number');
       $merchant_email = $request->input('merchant_email');
       $merchant_image = $request->input('profile_image');
      
       $merchant_identification_type_id =  $request->input('merchant_identification_type_id');
       $merchant_identification_number = $request->input('merchant_identification_number');
       $merchant_identification_image_1 = $request->input('merchant_identification_image_1');
       $merchant_identification_image_2 =  $request->input('merchant_identification_image_2');
       $business_name =  $request->input('business_name');
       $media_link =  $request->input('media_link');
       $address = $request->input('address');

       if($request->hasFile('merchant_identification_image_1')) {

       }

       if($request->hasFile('merchant_identification_image_2')) {

       }

       if($request->hasFile('profile_image')) {

       }


       /* save in merchant table */

      

        /* save in operator table */
       $merchant_id = '';
       $operator_name = $request->input('operator_name');
       $operator_email = $request->input('operator_email');
       $operator_password = $request->input('operator_password');
  /* save in operator table */
     
        /* save in payment details table **/
       if($request->input('payment_type_id') == 1) {
            
          $payment_type_id = $request->input('payment_type_id');
          $payment_provider_id =  $request->input('payment_provider_id');
          $mobile_account_number =  $request->input('mobile_account_number');
          $mobile_account_name =  $request->input('mobile_account_name');
       } else {
          $payment_type_id =  $request->input('payment_type_id');
          $account_type_id =  $request->input('account_type_id');
          $bank_holder_name =  $request->input('bank_holder_name');
          $bank_wallet_number =  $request->input('bank_wallet_number');
          $bank_branch_name =  $request->input('bank_branch_name');
          $bank_routing_number =  $request->input('bank_routing_number');
       }

      /* save in payment details table **/
     


        
       
    }

    public function login () {

    }
}
