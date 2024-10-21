<?php

namespace App\Repositories;


use Inertia\Inertia;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\CommuncationMethod;
use App\Models\TransactionCompleted;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\CommuncationMethodRepositoryInterface;

class CommuncationMethodRepository implements CommuncationMethodRepositoryInterface
{
    
    public function index()
    {
        return CommuncationMethod::with('user')->get();
       
    }


    public function show($id)
    {
        return CommuncationMethod::findOrFail($id);
    }

    public function  create()
    {

    }
    public function store(Request $request)
    {
        $data = new CommuncationMethod;
        $data->name_ar = $request->name_ar;
        $data->name_en = $request->name_en;
        
        
        // $data->active = $request->active;
        $data->created_by = Auth::user()->id;
        $data->updated_by = Auth::user()->id;
        $data->save();
        // return Permission::create($request->all());
        return $data;
    }

    public function  edit($id)
    {
        return CommuncationMethod::findOrFail($id);
    }

    public function update($id, Request $request)
    {
        $data = CommuncationMethod::findOrFail($id);
        // dd($request->name_ar);
        $data->name_ar = $request->name_ar ?? $data->name_ar;
        $data->name_en = $request->name_en ?? $data->name_en;
        
        // $data->active = $request->active ?? $data->active;
        $data->updated_by = Auth::user()->id;
        $data->save();
        return $data;
    }

    public function destroy($id)
    {
        $data = CommuncationMethod::findOrFail($id);

        // Perform soft delete
        $data->delete();
        return $data;
    }
}
