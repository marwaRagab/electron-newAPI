<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Installment_Client;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreInstallment_ClientRequest;
use App\Http\Requests\UpdateInstallment_ClientRequest;
use App\Interfaces\InstallmentClientsRepositoryInterface;

class InstallmentClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $InstallmentClientsRepository;

     public function __construct(InstallmentClientsRepositoryInterface $InstallmentClientsRepository)
     {
         $this->InstallmentClientsRepository = $InstallmentClientsRepository;
     }

     
     public function index()
     {
         //
         $data = $this->InstallmentClientsRepository->index();
         // return response()->json($permissions);
         return $this->respondSuccess($data, 'Get Data successfully.');
     }
  
     public function getall(Request $request)
     {
         if ($request->ajax()) {
             $data = Installment_Client::select('*');
             return DataTables::of($data)->toJson();
         }
     }
  
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
  
      public function create()
     {
         //
     }
  
     public function store(Request $request)
     {
         $messages = [
             'name_ar.required' => 'الاسم بالعربى  مطلوب.',
             'name_en.required' => 'الاسم بالانجليزية  مطلوب.',
             'governorate_id.required' => 'المحافظة   مطلوب.',
         ];
  
         $validatedData = Validator::make($request->all(), [
             'name_ar' => 'required',
             'name_en' => 'required',
             'governorate_id' =>'required'
         ], $messages);
  
         if ($validatedData->fails()) {
  
             return $this->respondError('Validation Error.', $validatedData->errors(), 400);
         }
         $data = $this->InstallmentClientsRepository->store($request);
         // return response()->json($nationalities);
         return $this->respondSuccess(result: $data, message: 'Store Data successfully.');
     }
  
     
    
  
     /**
      * Display the specified resource.
      *
      * @param  \App\Models\InstallmentClients  $InstallmentClients
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
         $data = $this->InstallmentClientsRepository->show($id);
         // return response()->json($data);
         return $this->respondSuccess($data, 'Get Data successfully.');
  
     }
  
     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Models\InstallmentClients  $InstallmentClients
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
         $data = $this->InstallmentClientsRepository->show($id);
         // return response()->json($data);
         return $this->respondSuccess($data, message: 'Get Data successfully.');
  
     }
  
     /**
      * Update the specified resource in storage.
      *
      * @param  \App\Http\Requests\UpdateInstallmentClientsRequest  $request
      * @param  \App\Models\InstallmentClients  $InstallmentClients
      * @return \Illuminate\Http\Response
      */
     public function update($id ,  Request $request)
     {
         //
         $data = $this->InstallmentClientsRepository->update($id  ,$request);
         // return response()->json($data);
         return $this->respondSuccess($data, 'Update Data successfully.');
  
     }
  
     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Models\InstallmentClients  $InstallmentClients
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         //
         $data = $this->InstallmentClientsRepository->destroy($id);
         // return response()->json($data);
         return $this->respondSuccess($data, message: 'Delete Data successfully.');
     }

    public function check_client($civil_number)
    {

        $data = Client::where('civil_number',$civil_number)->first();
        if($data)
        {
            return $this->respondSuccess(result: $data, message: 'fetch Data successfully.');
        }

        return $this->respondError('Error.', 'failed to fetch Data', 400);
    }
}
