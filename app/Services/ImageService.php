<?php

namespace App\Services;

use App\Models\Image;
use App\Models\Motel;

class ImageService
{

    // save multiple images and rewrite name with name of motel
    public function upload($request, $id)
    {
        $motel = Motel::find($id);
        if ($request->hasFile('images')) {
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
    }
}
