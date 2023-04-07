<?php

namespace App\Http\Controllers;

use App\Models\Attr;
use App\Http\Requests\StoreAttrRequest;
use App\Http\Requests\UpdateAttrRequest;
use App\Services\AttrService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class AttrController extends Controller
{
    protected $attrService;

    public function __construct(AttrService $attrService)
    {
        $this->attrService = $attrService;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        //
        $attrs = $this->attrService->getAll();
        // dd($attrs);
        if (request()->ajax()) {
            return view('admin.pages.attributes.load-attr-data', [
                'attrs' => $attrs
            ]);
        }
        return view('admin.pages.attributes.index', [
            'attrs' => $attrs
        ]);
    }

    public function getData(): JsonResponse
    {
        $attrs = $this->attrService->getAll();
        // dd($attrs);
        return response()->json([
            'attrs' => $attrs
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAttrRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttrRequest $request): JsonResponse
    {
        //
        $this->attrService->create($request);
        // return view('admin.pages.attributes.index', [
        //     'attrs' => $this->attrService->getAll()
        // ])->with('success', 'Attribute created successfully');
        return response()->json([
            'message' => 'Attribute created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attr  $attr
     * @return \Illuminate\Http\Response
     */
    public function show(Attr $attr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attr  $attr
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $attr = $this->attrService->getById($id);
        return view('admin.pages.attributes.edit', ['attr' => $attr]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAttrRequest  $request
     * @param  \App\Models\Attr  $attr
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttrRequest $request, $id): JsonResponse
    {
        //
        Log::alert($request->name);
        $this->attrService->update($request, $id);
        // return redirect()->route('attributes.index')->with('success', 'Attribute updated successfully');
        return response()->json([
            'message' => 'Attribute updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attr  $attr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): JsonResponse
    {
        //
        $this->attrService->delete($id);
        // return redirect()->route('attributes.index')->with('success', 'Attribute deleted successfully');
        return response()->json([
            'message' => 'Attribute deleted successfully'
        ]);
    }
}
