<?php

namespace App\Services;

use App\Models\Image;
use App\Models\Motel;
use Illuminate\Http\Request;
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

    public function delete($id)
    {
        try {
            //code...
            DB::beginTransaction();
            $image = Image::find($id);
            $image->delete();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function showImageByMotel($id)
    {
        try {
            //code...
            DB::beginTransaction();
            $images = Image::where('motel_id', $id)->get();
            DB::commit();
            return $images;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function createImageMotel(Request $request)
    {
        try {
            //code...
            DB::beginTransaction();
            if ($request->hasFile('images')) {
                $motel = Motel::find($request->motel_id);
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
