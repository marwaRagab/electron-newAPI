<?php

namespace App\Http\Controllers;

use App\Models\Boker;
use App\Http\Requests\StoreBokerRequest;
use App\Http\Requests\UpdateBokerRequest;

class BokerController extends Controller
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
     * @param  \App\Http\Requests\StoreBokerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBokerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Boker  $boker
     * @return \Illuminate\Http\Response
     */
    public function show(Boker $boker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Boker  $boker
     * @return \Illuminate\Http\Response
     */
    public function edit(Boker $boker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBokerRequest  $request
     * @param  \App\Models\Boker  $boker
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBokerRequest $request, Boker $boker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Boker  $boker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Boker $boker)
    {
        //
    }
}
