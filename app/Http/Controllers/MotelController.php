<?php

namespace App\Http\Controllers;

use App\Models\Motel;
use App\Models\Image;
use App\Http\Requests\StoreMotelRequest;
use App\Http\Requests\UpdateMotelRequest;
use Illuminate\Contracts\View\View;
use App\Services\AttrService;
use App\Services\MotelsService;
use App\Services\AddressService;
use App\Services\ImageService;
use App\Services\OrderService;
use Illuminate\Http\Request;


class MotelController extends Controller
{
    protected $motelsService;
    protected $attrService;
    protected $addressService;
    protected $imageService;
    protected $orderService;

    public function __construct(
        MotelsService $motelsService,
        AttrService $attrService,
        AddressService $addressService,
        ImageService $imageService,
        OrderService $orderService
    ) {
        $this->motelsService = $motelsService;
        $this->attrService = $attrService;
        $this->addressService = $addressService;
        $this->imageService = $imageService;
        $this->orderService = $orderService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        //
        try {
            $motels = $this->motelsService->getAll();
            $provinces = $this->addressService->getProvince();
            $attrs = $this->attrService->getAll();
            return view('admin.pages.motels.motelList', [
                'motels' => $motels,
                'attrs' => $attrs,
                'provinces' => $provinces
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        //
        $provinces = $this->addressService->getProvince();
        $attrs = $this->attrService->getAll();
        return view('admin.pages.motels.create', [
            'attrs' => $attrs,
            'provinces' => $provinces
        ]);
    }

    /**
     * Store a newly created resouprce in storage.
     *
     * @param  \App\Http\Requests\StoreMotelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMotelRequest $request)
    {
        // dd($request->all());
        $motel = $this->motelsService->create($request);
        $this->motelsService->attach($request, $motel->id);
        $this->imageService->upload($request, $motel->id);
        return redirect()->route('motels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Motel  $motel
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        //
        $motel = $this->motelsService->getById($id);
        return view('admin.pages.motels.motel_details', [
            'motel' => $motel,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Motel  $motel
     * @return \Illuminate\Http\Response
     */
    public function edit(Motel $motel): View
    {
        //
        $motel = $this->motelsService->getById($motel->id);
        $provinces = $this->addressService->getProvince();
        $attrs = $this->attrService->getAll();
        return view('admin.pages.motels.edit', [
            'motel' => $motel,
            'provinces' => $provinces,
            'attrs' => $attrs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMotelRequest  $request
     * @param  \App\Models\Motel  $motel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMotelRequest $request, $id)
    {
        //
        $this->motelsService->update($request, $id);
        $this->motelsService->sync($request, $id);
        $this->imageService->upload($request, $id);
        return redirect()->route('motels.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Motel  $motel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Motel $motel)
    {
        //
        $this->motelsService->delete($motel->id);
        return redirect()->route('motels.index');
    }

    public function search(Request $request)
    {
        // dd($request->all());
        $motels = $this->motelsService->search($request);
        // dd($motels);
        $attrs = $this->attrService->getAll();
        $provinces = $this->addressService->getProvince();
        return view('admin.pages.motels.motelList', [
            'motels' => $motels,
            'attrs' => $attrs,
            'provinces' => $provinces
        ]);
    }


    // ================== Client ==================
    public function motelClient()
    {
        try {
            $motels = $this->motelsService->getAll();
            $provinces = $this->addressService->getProvince();
            $attrs = $this->attrService->getAll();
            return view('client.pages.motels', [
                'motels' => $motels,
                'attrs' => $attrs,
                'provinces' => $provinces
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function showMotelClient($id): View
    {
        //
        $orders = $this->orderService->getOrderByMotel($id);
        $motel = $this->motelsService->getById($id);
        return view('client.pages.motel_detail', [
            'motel' => $motel,
            'orders' => $orders
        ]);
    }

    public function searchMotelClient(Request $request)
    {
        $motels = $this->motelsService->search($request);
        $attrs = $this->attrService->getAll();
        $provinces = $this->addressService->getProvince();
        return view('client.pages.motels', [
            'motels' => $motels,
            'attrs' => $attrs,
            'provinces' => $provinces
        ]);
    }
}
