<?php

namespace App\Repositories;

use Inertia\Inertia;
use App\Models\Nationality;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\CourtRepositoryInterface;
use App\Models\Court;
use App\Models\Governorate;

class CourtRepository implements CourtRepositoryInterface
{
    

    public function index()
    {
        return Court::all();
       
    }


    public function show($id)
    {
        return Court::findOrFail($id);
    }

    public function  create()
    {

    }
    public function store(Request $request)
    {
        $data = new Court;
        $data->name_ar = $request->name_ar;
        $data->name_en = $request->name_en;
        $data->governorate_id = $request->governorate_id;
        $data->created_by = Auth::user()->id;
        $data->updated_by = Auth::user()->id;
        $data->save();
        // return Nationality::create($request->all());
        return $data;
    }

    public function  edit($id)
    {
        return Court::findOrFail($id);
    }

    public function update($id, Request $request)
    {
        $data = Court::findOrFail($id);
        // $user->update($request->all());
        $data->name_ar = $request->name_ar;
        $data->name_en = $request->name_en;
        $data->governorate_id = $request->governorate_id;
        $data->updated_by = Auth::user()->id;
        $data->save();

        return $data;
    }

    public function destroy($id)
    {
        // return Nationality::destroy($id);
        $data = Court::findOrFail($id);

        // Perform soft delete
        $data->delete();
        return $data;
    }
}
