<?php

namespace App\Services;

use App\Models\Motel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
            DB::beginTransaction();
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
            DB::commit();
            return $motel;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
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
        return Motel::paginate(4);
    }

    public function getOwnerMotels()
    {
        return Motel::where('owner_id', Auth::user()->id)->orderBy("created_at", "desc")->paginate(3);
    }

    public function getById($id)
    {
        return Motel::findOrFail($id);
    }

    public function attach($request, $id)
    {
        try {
            //code...
            DB::beginTransaction();
            $motel = Motel::find($id);
            foreach ($request->attribute as $key => $value) {
                $motel->attrs()->attach($value);
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function sync($request, $id)
    {
        $motel = Motel::find($id);
        $motel->attrs()->sync($request->attribute);
    }

    public function search()
    {
        $query = Motel::query();
        if (!empty(request()->name)) {
            $query->where('name', 'like', '%' . request()->name . '%');
        }
        if (!empty(request()->price)) {
            $query->orderBy('price', request()->price);
        }
        if (!empty(request()->acreage)) {
            $query->where('acreage', request()->acreage);
        }
        if (!empty(request()->province_id)) {
            $query->where('province_id', request()->province_id);
        }
        if (!empty(request()->district_id)) {
            $query->where('district_id', request()->district_id);
        }
        if (!empty(request()->ward_id)) {
            $query->where('ward_id', request()->ward_id);
        }
        // if (!empty(request()->attribute)) {
        //     $query->whereHas('attrs', function ($q) use (request()) {
        //         $q->whereIn('attrs.id', request()->attribute);
        //     });
        // }
        // dd($query->toSql());
        return $query->paginate(4);
    }
}
