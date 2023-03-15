<?php

namespace App\Services;

use App\Models\Motel;
use Illuminate\Support\Facades\Auth;

class MotelsService
{
    protected $motel;

    public function __construct(Motel $motel)
    {
        $this->motel = $motel;
    }

    public function create($request)
    {
        try {
            //code...

        } catch (\Throwable $th) {
            //throw $th;
        }
        $motel = new Motel();
        $motel->name = $request->name;
        $motel->price = $request->price;
        $motel->status = $request->status;
        $motel->acreage = $request->acreage;
        $motel->province_id = $request->province_id;
        $motel->district_id = $request->district_id;
        $motel->ward_id = $request->ward_id;
        $motel->address = $request->address;
        $motel->description = $request->description;
        $motel->owner_id = Auth::user()->id;
        $motel->save();
        return $motel;
    }

    public function update($request, $id)
    {
        $motel = Motel::find($id);
        $motel->name = $request->name;
        $motel->price = $request->price;
        $motel->status = $request->status;
        $motel->acreage = $request->acreage;
        $motel->province_id = $request->province_id;
        $motel->district_id = $request->district_id;
        $motel->ward_id = $request->ward_id;
        $motel->address = $request->address;
        $motel->description = $request->description;
        $motel->owner_id = Auth::user()->id;
        $motel->save();
        return $motel;
    }

    public function delete($id)
    {
        $motel = Motel::find($id);
        $motel->delete();
        return $motel;
    }

    public function getAll()
    {
        return Motel::all();
    }

    public function getById($id)
    {
        return Motel::find($id);
    }

    public function attach($request, $id)
    {
        $motel = Motel::find($id);
        foreach ($request->attribute as $key => $value) {
            $motel->attrs()->attach($value);
        }
    }

    public function sync($request, $id)
    {
        $motel = Motel::find($id);
        $motel->attrs()->sync($request->attribute);
    }
}
