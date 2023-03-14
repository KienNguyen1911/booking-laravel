<?php

namespace App\Http\Controllers;

use App\Models\Motel;
use App\Http\Requests\StoreMotelRequest;
use App\Http\Requests\UpdateMotelRequest;

class MotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
