<?php

namespace App\Repositories;

use Inertia\Inertia;
use App\Models\Nationality;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\RegionRepositoryInterface;
use App\Models\Region;
use App\Models\Governorate;


class RegionRepository implements RegionRepositoryInterface
{
    

    public function index()
    {
        return Region::with('government')->get();
       
    }

    public function show($id)
    {
        return Region::findOrFail($id);
    }

    public function  create()
    {

    }
    public function store(Request $request)
    {
        $data = new Region;
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
        return Region::findOrFail($id);
    }

    public function update($id, Request $request)
    {
        $data = Region::findOrFail($id);
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
        $data = Region::findOrFail($id);

        // Perform soft delete
        $data->delete();
        return $data;
    }
}
