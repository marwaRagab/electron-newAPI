<?php

namespace App\Http\Controllers;

use App\Models\Installment_Percentage;
use App\Http\Requests\StoreInstallment_PercentageRequest;
use App\Http\Requests\UpdateInstallment_PercentageRequest;

class InstallmentPercentageController extends Controller
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
     * @param  \App\Http\Requests\StoreInstallment_PercentageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInstallment_PercentageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Installment_Percentage  $installment_Percentage
     * @return \Illuminate\Http\Response
     */
    public function show(Installment_Percentage $installment_Percentage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Installment_Percentage  $installment_Percentage
     * @return \Illuminate\Http\Response
     */
    public function edit(Installment_Percentage $installment_Percentage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInstallment_PercentageRequest  $request
     * @param  \App\Models\Installment_Percentage  $installment_Percentage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInstallment_PercentageRequest $request, Installment_Percentage $installment_Percentage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Installment_Percentage  $installment_Percentage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Installment_Percentage $installment_Percentage)
    {
        //
    }
}
