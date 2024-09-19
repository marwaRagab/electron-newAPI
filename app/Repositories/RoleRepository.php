<?php

namespace App\Repositories;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\RoleRepositoryInterface;
use App\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{
    
    public function index()
    {
        return Role::all();
       
    }


    public function show($id)
    {
        return Role::findOrFail($id);
    }

    public function  create()
    {

    }
    public function store(Request $request)
    {
        $data = new Role;
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
        return Role::findOrFail($id);
    }

    public function update($id, Request $request)
    {
        $data = Role::findOrFail($id);
        // dd($request->name_ar);
        $data->name_ar = $request->name_ar ?? $data->name_ar;
        $data->name_en = $request->name_en ?? $data->name_en;
        $data->updated_by = Auth::user()->id;
        $data->save();
        return $data;
    }

    public function destroy($id)
    {
        $data = Role::findOrFail($id);

        // Perform soft delete
        $data->delete();
        return $data;
    }
}
