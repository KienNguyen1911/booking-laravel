<?php

namespace App\Services;

use App\Models\Attr;
use App\Services\BaseService;

class AttrService
{

    public function create($request)
    {
        $attr = new Attr();
        $attr->name = $request->name;
        $attr->save();
        return $attr;
    }

    public function update($request, $id)
    {
        $attr = Attr::find($id);
        $attr->name = $request->name;
        $attr->save();
        return $attr;
    }

    public function delete($id)
    {
        $attr = Attr::find($id);
        $attr->delete();
        return $attr;
    }

    public function getAll()
    {
        return Attr::all();
    }

    public function getById($id)
    {
        return Attr::find($id);
    }
}
