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


       $operator_name = $request->input('operator_name');
       $operator_email = $request->input('operator_email');
       $operator_password = $request->input('operator_password');


        
       
    }

    public function login () {

    }
}
