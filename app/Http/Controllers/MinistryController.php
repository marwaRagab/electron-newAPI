<?php

namespace App\Http\Controllers;

use App\Models\Ministry;
use App\Http\Requests\StoreMinistryRequest;
use App\Http\Requests\UpdateMinistryRequest;

class MinistryController extends Controller
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
     * @param  \App\Http\Requests\StoreMinistryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMinistryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ministry  $ministry
     * @return \Illuminate\Http\Response
     */
    public function show(Ministry $ministry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ministry  $ministry
     * @return \Illuminate\Http\Response
     */
    public function edit(Ministry $ministry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMinistryRequest  $request
     * @param  \App\Models\Ministry  $ministry
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMinistryRequest $request, Ministry $ministry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ministry  $ministry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ministry $ministry)
    {
        //
    }
}
