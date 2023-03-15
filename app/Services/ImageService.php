<?php

namespace App\Services;

use App\Models\Image;
use App\Models\Motel;
use Illuminate\Support\Facades\DB;

class ImageService
{

    // save multiple images and rewrite name with name of motel
    public function upload($request, $id)
    {
        try {
            //code...
            DB::beginTransaction();
            if ($request->hasFile('images')) {
                $motel = Motel::find($id);
                $images = $request->file('images');
                $count = 1;
                foreach ($images as $image) {
                    $name = $motel->name . '-' . $count . '-' . $image->getClientOriginalName();
                    $image->move(public_path() . '/motel_images/', $name);
                    $image->name = $name;
                    Image::create([
                        'name' => $name,
                        'motel_id' => $motel->id
                    ]);
                    $count++;
                }
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
