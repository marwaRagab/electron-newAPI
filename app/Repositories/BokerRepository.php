<?php

namespace App\Repositories;

use Inertia\Inertia;
use App\Models\Boker;
use App\Models\Governorate;
use App\Models\Nationality;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\BokerRepositoryInterface;


class BokerRepository implements BokerRepositoryInterface
{
    

    public function index()
    {
        return Boker::with(  'user')->get();
       
    }

    public function show($id)
    {
        return Boker::findOrFail($id);
    }

    public function  create()
    {

    }
    public function store(Request $request)
    {
        $data = new Boker;
        $data->name_ar = $request->name_ar;
        $data->name_en = $request->name_en;
        $data->phone = $request->phone;
        $data->percentage = $request->percentage;
        $data->percentage_amount = $request->percentage_amount;
        $data->created_by = Auth::user()->id;
        $data->updated_by = Auth::user()->id;
        $data->save();
        // return Nationality::create($request->all());
        return $data;
    }

    public function  edit($id)
    {
        return Boker::findOrFail($id);
    }

    public function update($id, Request $request)
    {
        $data = Boker::findOrFail($id);
        // $user->update($request->all());
        $data->name_ar = $request->name_ar;
        $data->name_en = $request->name_en;
        $data->phone = $request->phone;
        $data->percentage = $request->percentage;
        $data->percentage_amount = $request->percentage_amount;
        $data->updated_by = Auth::user()->id;
        $data->save();

        return $data;
    }

    public function destroy($id)
    {
        // return Nationality::destroy($id);
        $data = Boker::findOrFail($id);

        // Perform soft delete
        $data->delete();
        return $data;
    }
}
