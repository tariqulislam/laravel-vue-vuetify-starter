<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AccountType;
use App\Models\PaymentProvider;
use App\Models\IdentificationTypes;
use App\Models\PaymentType;


class MerchantController extends Controller
{
    //
    //
    public function loadIdentificationTypes()
    {
        $lstIdentificationTypes = IdentificationTypes::all();
        return response()->json($lstIdentificationTypes);
    }

    public function loadAccountTypes()
    {
        $lstAccountTypes = AccountType::all();
        return response()->json($lstAccountTypes);
    }

    public function loadPaymentProviders()
    {
        $lstPaymentProvider = PaymentProvider::all();
        return response()->json($lstPaymentProvider);
    }
}
