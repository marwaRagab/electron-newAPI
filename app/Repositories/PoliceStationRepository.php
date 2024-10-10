<?php

namespace App\Repositories;

use Inertia\Inertia;
use App\Models\Governorate;
use App\Models\Nationality;
use Illuminate\Http\Request;
use App\Models\Police_station;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\PoliceStationRepositoryInterface;


class PoliceStationRepository implements PoliceStationRepositoryInterface
{
    

    public function index()
    {
        return Police_station::with('region', 'user')->get();
       
    }
    
    public function show($id)
    {
        return Police_station::findOrFail($id);
    }

    public function  create()
    {

    }
    public function store(Request $request)
    {
        $data = new Police_station;
        $data->name_ar = $request->name_ar;
        $data->name_en = $request->name_en;
        $data->region_id = $request->region_id;
        $data->created_by = Auth::user()->id;
        $data->updated_by = Auth::user()->id;
        $data->save();
        // return Nationality::create($request->all());
        return $data;
    }

    public function  edit($id)
    {
        return Police_station::findOrFail($id);
    }

    public function update($id, Request $request)
    {
        $data = Police_station::findOrFail($id);
        // $user->update($request->all());
        $data->name_ar = $request->name_ar;
        $data->name_en = $request->name_en;
        $data->region_id = $request->region_id;
        $data->updated_by = Auth::user()->id;
        $data->save();

        return $data;
    }

    public function destroy($id)
    {
        // return Nationality::destroy($id);
        $data = Police_station::findOrFail($id);

        // Perform soft delete
        $data->delete();
        return $data;
    }
}
