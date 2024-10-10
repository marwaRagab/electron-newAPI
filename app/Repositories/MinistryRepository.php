<?php

namespace App\Repositories;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Ministry;
use Illuminate\Http\Request;
// use App\Interfaces\MinistryRepositoryInterface;
use Yajra\DataTables\DataTables;
use App\Models\Ministry_Percentage;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\MinistryRepositoryInterface;

class MinistryRepository implements MinistryRepositoryInterface
{
    
    public function index()
    {
        // $data['Ministry'] =Ministry::with('ministryPercentage')->get();
        // $data['ministryPercentage'] =Ministry_Percentage::all();
        return Ministry::with('ministryPercentage' , 'user')->get();
       
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
        // $data->date = Carbon::createFromFormat('d-m-Y', )->format('Y-m-d H:i:s');
        $data->date = Carbon::parse(time: $request->date)->format('Y-m-d H:i:s');
        // $data->percent = $request->percent;
        $data->ministry_percentage_id = $request->ministry_percentage_id;
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
