<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/account/types', 'Admin\MerchantController@loadAccountTypes');
Route::get('/identification/types', 'Admin\MerchantController@loadIdentificationTypes');
Route::get('/payment/types', 'Admin\MerchantController@loadPaymentTypes');
Route::get('/payment/providers' , 'Admin\MerchantController@loadPaymentProviders');