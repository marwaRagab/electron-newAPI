<?php

namespace App\Repositories;

use Inertia\Inertia;
use App\Models\Nationality;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\GovernorateRepositoryInterface;
use App\Models\Governorate;

class GovernorateRepository implements GovernorateRepositoryInterface
{
    // public function index(Request $request)
    // {
    //     return Nationality::all();
       
    // }

    public function index()
    {
        return Governorate::all();
       
    }


    public function show($id)
    {
        return Governorate::findOrFail($id);
    }

    public function  create()
    {

    }
    public function store(Request $request)
    {
        $data = new Governorate;
        $data->name_ar = $request->name_ar;
        $data->name_en = $request->name_en;
        $data->created_by = Auth::user()->id;
        $data->updated_by = Auth::user()->id;
        $data->save();
        // return Nationality::create($request->all());
        return $data;
    }

    public function  edit($id)
    {
        return Governorate::findOrFail($id);
    }

    public function update($id, Request $request)
    {
        $data = Governorate::findOrFail($id);
        // $user->update($request->all());
        $data->name_ar = $request->name_ar;
        $data->name_en = $request->name_en;
        $data->updated_by = Auth::user()->id;
        $data->save();

        return $data;
    }

    public function destroy($id)
    {
        // return Nationality::destroy($id);
        $data = Governorate::findOrFail($id);

        // Perform soft delete
        $data->delete();
        return $data;
    }
}
