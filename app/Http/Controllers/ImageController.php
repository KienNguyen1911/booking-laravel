<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Services\ImageService;
use App\Services\MotelsService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ImageController extends Controller
{
    protected $imageService;
    protected $motelsService;

    public function __construct(ImageService $imageService, MotelsService $motelsService)
    {
        $this->imageService = $imageService;
        $this->motelsService = $motelsService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $this->imageService->upload($request, $id);
        return redirect()->route('images.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        //
        $images = $this->imageService->showImageByMotel($id);
        return view('admin.pages.images', [
            'images' => $images
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->imageService->delete($id);
        return redirect()->back();
    }

    public function addImageMotel(Request $request)
    {
        // dd($request->all());
        $image = $this->imageService->createImageMotel($request);
        return redirect()->back();
    }
}
