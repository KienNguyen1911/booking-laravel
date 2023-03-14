<?php

namespace App\Services;

use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
use Illuminate\Support\Facades\Request;

class AddressService
{
    private $province;
    private $district;
    private $ward;

    public function __construct(Province $province, District $district, Ward $ward)
    {
        $this->province = $province;
        $this->district = $district;
        $this->ward = $ward;
    }

    public function getProvince()
    {
        return $this->province->all();
    }

    public function getDistrict($request)
    {
        $districts = $this->district->where('province_id', $request->province_id)->get();
        return $districts;
    }

    public function getWard($request)
    {
        $wards = $this->ward->where('district_id', $request->district_id)->get();
        return $wards;
    }
}
