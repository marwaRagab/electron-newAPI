<?php

namespace App\Repositories;

use App\Models\Role;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\RoleRepositoryInterface;

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

        if($request->has('permission'))
        {
            foreach($request->permission as $item)
            {
                DB::table('role_permissions')->insert([
                    'role_id' => $data->id,  // assuming 1 is the role ID
                    'permission_id' => $item,  // assuming 2 is the permission ID
                ]);
            }
        }
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
        if($request->has('permission'))
        {
            foreach($request->permission as $item)
            {
                DB::table('role_permissions')->insert([
                    'role_id' => $data->id,  // assuming 1 is the role ID
                    'permission_id' => $item,  // assuming 2 is the permission ID
                ]);
            }
        }
        
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
