<?php

namespace App\Http\Controllers;

use App\Models\InstallmentNote;
use App\Http\Requests\StoreInstallmentNoteRequest;
use App\Http\Requests\UpdateInstallmentNoteRequest;

class InstallmentNoteController extends Controller
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
     * @param  \App\Http\Requests\StoreInstallmentNoteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInstallmentNoteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InstallmentNote  $installmentNote
     * @return \Illuminate\Http\Response
     */
    public function show(InstallmentNote $installmentNote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InstallmentNote  $installmentNote
     * @return \Illuminate\Http\Response
     */
    public function edit(InstallmentNote $installmentNote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInstallmentNoteRequest  $request
     * @param  \App\Models\InstallmentNote  $installmentNote
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInstallmentNoteRequest $request, InstallmentNote $installmentNote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InstallmentNote  $installmentNote
     * @return \Illuminate\Http\Response
     */
    public function destroy(InstallmentNote $installmentNote)
    {
        //
    }
}
