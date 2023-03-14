<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
use App\Services\AddressService;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    protected $addressService;

    public function __construct(AddressService $addressService)
    {
        $this->addressService = $addressService;
    }

    //
    public function getProvince()
    {
        $this->addressService->getProvince();
    }

    public function getDistrict(Request $request)
    {
        $districts = $this->addressService->getDistrict($request);
        return response()->json($districts);
    }

    public function getWard(Request $request)
    {
        $wards = $this->addressService->getWard($request);
        return response()->json($wards);
    }
}
