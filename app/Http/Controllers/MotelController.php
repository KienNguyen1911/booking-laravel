<?php

namespace App\Http\Controllers;

use App\Models\Motel;
use App\Http\Requests\StoreMotelRequest;
use App\Http\Requests\UpdateMotelRequest;
use Illuminate\Contracts\View\View;
use App\Services\AttrService;
use App\Services\MotelsService;
use App\Services\AddressService;

class MotelController extends Controller
{
    protected $motelsService;
    protected $attrService;
    protected $addressService;

    public function __construct(MotelsService $motelsService, AttrService $attrService, AddressService $addressService)
    {
        $this->motelsService = $motelsService;
        $this->attrService = $attrService;
        $this->addressService = $addressService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        //
        $motels = $this->motelsService->getAll();
        return view('admin.pages.motels.motelList', [
            'motels' => $motels
        ]);
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
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMotelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMotelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Motel  $motel
     * @return \Illuminate\Http\Response
     */
    public function show(Motel $motel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Motel  $motel
     * @return \Illuminate\Http\Response
     */
    public function edit(Motel $motel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMotelRequest  $request
     * @param  \App\Models\Motel  $motel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMotelRequest $request, Motel $motel)
    {
        //
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
    }
}
