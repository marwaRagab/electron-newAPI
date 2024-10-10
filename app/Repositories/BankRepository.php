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
        return Bank::with( 'user')->get();
       
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
        $data->bank_account_number = $request->bank_account_number;
        $data->bank_account_date = $request->bank_account_date;
        $data->iban = $request->iban;
        $data->branch = $request->branch;
        $data->authorized_signatory_1 = $request->authorized_signatory_1;
        $data->authorized_signatory_2 = $request->authorized_signatory_2;
        $data->authorized_signatory_3 = $request->authorized_signatory_3;
        // $data->active = $request->active;
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
        $data->bank_account_number = $request->bank_account_number ?? $data->bank_account_number;
        $data->bank_account_date = $request->bank_account_date ?? $data->bank_account_date;
        $data->iban = $request->iban ?? $data->iban;
        $data->branch = $request->branch ?? $data->branch;
        $data->authorized_signatory_1 = $request->authorized_signatory_1 ?? $data->authorized_signatory_1;
        $data->authorized_signatory_2 = $request->authorized_signatory_2 ?? $data->authorized_signatory_2;
        $data->authorized_signatory_3 = $request->authorized_signatory_3 ?? $data->authorized_signatory_3;
        // $data->active = $request->active ?? $data->active;
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
