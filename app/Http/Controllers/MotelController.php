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
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
            $motels = $this->motelsService->getOwnerMotels();
            $provinces = $this->addressService->getProvince();
            $attrs = $this->attrService->index();
            // $motel = $this->motelsService->getById($motel->id);


            if (request()->ajax()) {
                return view("admin.pages.motels.motel-load", compact('motels', 'attrs', 'provinces'));
            }
            return view('admin.pages.motels.motel-list', [
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
        $attrs = $this->attrService->index();
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
        Log::info($request->all());
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
        if (Auth::user()->id == $motel->owner_id) {
            $motel = $this->motelsService->getById($id);
            return view('admin.pages.motels.motel_details', [
                'motel' => $motel,
            ]);
        } else {
            abort(404);
        }
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
        $attrs = $this->attrService->index();

        if (request()->ajax()) {
            return view("admin.pages.motels.edit-modal", compact('motel', 'attrs', 'provinces'));
        }
        return view('admin.pages.motels.edit-modal', [
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
    public function update(UpdateMotelRequest $request, $id): JsonResponse
    {
        //
        $this->motelsService->update($request, $id);
        $this->motelsService->sync($request, $id);
        $this->imageService->upload($request, $id);
        // return redirect()->route('motels.show', $id);
        return response()->json([
            'message' => 'Update Motel Successfully'
        ]);
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

    public function search()
    {
        // dd($request->all());
        dd(request()->all());
        Log::alert(request()->all());
        $motels = $this->motelsService->search();
        // dd($motels);
        $attrs = $this->attrService->index();
        $provinces = $this->addressService->getProvince();

        if (request()->ajax()) {
            return view("admin.pages.motels.motel-load", compact('motels', 'attrs', 'provinces'));
        }

        return view('admin.pages.motels.motel-list', [
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

    public function searchMotelClient()
    {
        // dd(request()->all());
        $motels = $this->motelsService->search();
        $attrs = $this->attrService->getAll();
        $provinces = $this->addressService->getProvince();
        return view('client.pages.motels', [
            'motels' => $motels,
            'attrs' => $attrs,
            'provinces' => $provinces
        ]);
    }
}
