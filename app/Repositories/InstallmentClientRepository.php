<?php

namespace App\Repositories;

use App\Models\Role;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Installment_Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\InstallmentClientsRepositoryInterface;


class InstallmentClientRepository implements InstallmentClientsRepositoryInterface
{
    
    public function index()
    {
        return Installment_Client::with('user','region','ministry_working','bank','Boker','governorate')->get();
    }


    public function show($id)
    {
        return Installment_Client::findOrFail($id);
    }

    public function  create()
    {

    }
    public function store(Request $request)
    {
        // dd($request);
        $data = new Installment_Client;
        $data->name_ar = $request->name_ar;
        $data->name_en = $request->name_en;
        $data->salary = $request->salary;
        $data->civil_number = $request->civil_number;
        $data->phone = $request->phone;
        $data->notes = $request->notes ?? null;
        $data->status = $request->status ?? "advanced";
        $data->bank_id = $request->bank_id ?? null;
        $data->area_id = $request->area_id ?? null;
        $data->ministry_id = $request->ministry_id ?? null;
        $data->governorate_id = $request->governorate_id ?? null;
        $data->boker_id = $request->boker_id ?? null;
        $data->installment_total =  $request->installment_total ?? null;
        $data->created_by = Auth::user()->id;
        $data->updated_by = Auth::user()->id;
        $data->save();

        // if($request->has('permission'))
        // {
        //     foreach($request->permission as $item)
        //     {
        //         DB::table('role_permissions')->insert([
        //             'role_id' => $data->id,  // assuming 1 is the role ID
        //             'permission_id' => $item,  // assuming 2 is the permission ID
        //         ]);
        //     }
        // }
        // return Permission::create($request->all());
        return $data;
    }

    public function  edit($id)
    {
        return Installment_Client::findOrFail($id);
    }

    public function update($id, Request $request)
    {
        $data = Installment_Client::findOrFail($id);
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
        $data = Installment_Client::findOrFail($id);

        // Perform soft delete
        $data->delete();
        return $data;
    }
}
