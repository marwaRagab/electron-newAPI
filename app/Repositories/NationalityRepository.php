<?php

namespace App\Repositories;

use Inertia\Inertia;
use App\Models\Nationality;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\NationalityRepositoryInterface;

class NationalityRepository implements NationalityRepositoryInterface
{
    // public function index(Request $request)
    // {
    //     return Nationality::all();
       
    // }

    public function index()
    {
        return Nationality::all();
       
    }


    public function show($id)
    {
        return Nationality::findOrFail($id);
    }

    public function  create()
    {

    }
    public function store(Request $request)
    {
        $data = new Nationality;
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
        return Nationality::findOrFail($id);
    }

    public function update($id, Request $request)
    {
        $data = Nationality::findOrFail($id);
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
        $data = Nationality::findOrFail($id);

        // Perform soft delete
        $data->delete();
        return $data;
    }
}
