<?php

namespace App\Services;

use App\Models\Motel;

class MotelsService
{
    protected $motel;

    public function __construct(Motel $motel)
    {
        $this->motel = $motel;
    }

    public function create($request)
    {
        $motel = new Motel();
        $motel->name = $request->name;
        $motel->address = $request->address;
        $motel->phone = $request->phone;
        $motel->price = $request->price;
        $motel->description = $request->description;
        $motel->user_id = $request->user_id;
        $motel->save();
        return $motel;
    }

    public function update($request, $id)
    {
        $motel = Motel::find($id);
        $motel->name = $request->name;
        $motel->address = $request->address;
        $motel->phone = $request->phone;
        $motel->price = $request->price;
        $motel->description = $request->description;
        $motel->user_id = $request->user_id;
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
}
