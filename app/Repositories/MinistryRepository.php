<?php

namespace App\Repositories;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\MinistryRepositoryInterface;
use App\Models\Ministry;

class MinistryRepository implements MinistryRepositoryInterface
{
    
    public function index()
    {
        return Ministry::all();
       
    }


    public function show($id)
    {
        return Ministry::findOrFail($id);
    }

    public function  create()
    {

    }
    public function store(Request $request)
    {
        $data = new Ministry;
        $data->name_ar = $request->name_ar;
        $data->name_en = $request->name_en;
        $data->date = $request->date;
        $data->percent = $request->percent;
        $data->created_by = Auth::user()->id;
        $data->updated_by = Auth::user()->id;
        $data->save();
        // return Permission::create($request->all());
        return $data;
    }

    public function  edit($id)
    {
        return Ministry::findOrFail($id);
    }

    public function update($id, Request $request)
    {
        $data = Ministry::findOrFail($id);
        // dd($request->name_ar);
        $data->name_ar = $request->name_ar;
        $data->name_en = $request->name_en;
        $data->date = $request->date;
        $data->percent = $request->percent;
        $data->updated_by = Auth::user()->id;
        $data->save();
        return $data;
    }

    public function destroy($id)
    {
        $data = Ministry::findOrFail($id);

        // Perform soft delete
        $data->delete();
        return $data;
    }
}
