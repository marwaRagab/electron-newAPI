<?php

namespace App\Http\Controllers;

use App\Models\Installment_Client;
use App\Http\Requests\StoreInstallment_ClientRequest;
use App\Http\Requests\UpdateInstallment_ClientRequest;

class InstallmentClientController extends Controller
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
     * @param  \App\Http\Requests\StoreInstallment_ClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInstallment_ClientRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Installment_Client  $installment_Client
     * @return \Illuminate\Http\Response
     */
    public function show(Installment_Client $installment_Client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Installment_Client  $installment_Client
     * @return \Illuminate\Http\Response
     */
    public function edit(Installment_Client $installment_Client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInstallment_ClientRequest  $request
     * @param  \App\Models\Installment_Client  $installment_Client
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInstallment_ClientRequest $request, Installment_Client $installment_Client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Installment_Client  $installment_Client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Installment_Client $installment_Client)
    {
        //
    }
}
