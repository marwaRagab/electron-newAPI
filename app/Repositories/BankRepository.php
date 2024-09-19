<?php

namespace App\Repositories;


use App\Models\Bank;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\BankRepositoryInterface;

class BankRepository implements BankRepositoryInterface
{
    
    public function index()
    {
        return Bank::all();
       
    }


    public function show($id)
    {
        return Bank::findOrFail($id);
    }

    public function  create()
    {

    }
    public function store(Request $request)
    {
        $data = new Bank;
        $data->name_ar = $request->name_ar;
        $data->name_en = $request->name_en;
        $data->created_by = Auth::user()->id;
        $data->updated_by = Auth::user()->id;
        $data->save();
        // return Permission::create($request->all());
        return $data;
    }

    public function  edit($id)
    {
        return Bank::findOrFail($id);
    }

    public function update($id, Request $request)
    {
        $data = Bank::findOrFail($id);
        // dd($request->name_ar);
        $data->name_ar = $request->name_ar ?? $data->name_ar;
        $data->name_en = $request->name_en ?? $data->name_en;
        $data->updated_by = Auth::user()->id;
        $data->save();
        return $data;
    }

    public function destroy($id)
    {
        $data = Bank::findOrFail($id);

        // Perform soft delete
        $data->delete();
        return $data;
    }
}
