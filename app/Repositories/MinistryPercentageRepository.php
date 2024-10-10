<?php

namespace App\Repositories;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Ministry_Percentage;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\MinistryPercentageRepositoryInterface;


class MinistryPercentageRepository implements MinistryPercentageRepositoryInterface
{
    
    public function index()
    {
        return Ministry_Percentage::with('user')->get();
       
    }

    public function show($id)
    {
        return Ministry_Percentage::findOrFail($id);
    }

    public function  create()
    {

    }
    public function store(Request $request)
    {
        $data = new Ministry_Percentage;
        $data->name = $request->name;
        $data->percent = $request->percent;
        $data->created_by = Auth::user()->id;
        $data->updated_by = Auth::user()->id;
        $data->save();
        // return Permission::create($request->all());
        return $data;
    }

    public function  edit($id)
    {
        return Ministry_Percentage::findOrFail($id);
    }

    public function update($id, Request $request)
    {
        $data = Ministry_Percentage::findOrFail($id);
        // dd($request->name_ar);
        $data->name = $request->name;
        $data->percent = $request->percent;
        $data->updated_by = Auth::user()->id;
        $data->save();
        return $data;
    }

    public function destroy($id)
    {
        $data = Ministry_Percentage::findOrFail($id);

        // Perform soft delete
        $data->delete();
        return $data;
    }
}
