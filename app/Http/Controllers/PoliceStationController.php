<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Police_station;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StorePolice_stationRequest;
use App\Http\Requests\UpdatePolice_stationRequest;
use App\Interfaces\PoliceStationRepositoryInterface;

class PoliceStationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $PoliceStationRepository;

    public function __construct(PoliceStationRepositoryInterface $PoliceStationRepository)
    {
        $this->PoliceStationRepository = $PoliceStationRepository;
    }
   public function index()
   {
       //
       $data = $this->PoliceStationRepository->index();
       // return response()->json($permissions);
       return $this->respondSuccess($data, 'Get Data successfully.');
   }

   public function getall(Request $request)
   {
       if ($request->ajax()) {
           $data = Police_station::select('*');
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
           'region_id.required' => 'المنطقة   مطلوب.',
       ];

       $validatedData = Validator::make($request->all(), [
           'name_ar' => 'required',
           'name_en' => 'required',
           'region_id' =>'required'
       ], $messages);

       if ($validatedData->fails()) {

           return $this->respondError('Validation Error.', $validatedData->errors(), 400);
       }
       $data = $this->PoliceStationRepository->store($request);
       // return response()->json($nationalities);
       return $this->respondSuccess(result: $data, message: 'Store Data successfully.');
   }

   
  

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Region  $Region
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       $data = $this->PoliceStationRepository->show($id);
       // return response()->json($data);
       return $this->respondSuccess($data, 'Get Data successfully.');

   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Region  $Region
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       $data = $this->PoliceStationRepository->show($id);
       // return response()->json($data);
       return $this->respondSuccess($data, message: 'Get Data successfully.');

   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateRegionRequest  $request
    * @param  \App\Models\Region  $Region
    * @return Response
    */
   public function update($id ,  Request $request)
   {
       //
       $data = $this->PoliceStationRepository->update($id  ,$request);
       // return response()->json($data);
       return $this->respondSuccess($data, 'Update Data successfully.');

   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Region  $Region
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       //
       $data = $this->PoliceStationRepository->destroy($id);
       // return response()->json($data);
       return $this->respondSuccess($data, message: 'Delete Data successfully.');
   }
}
