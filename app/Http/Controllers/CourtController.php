<?php

namespace App\Http\Controllers;

use App\Models\Court;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourtRequest;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\UpdateCourtRequest;
use Illuminate\Support\Facades\Validator;
use App\Interfaces\CourtRepositoryInterface;

class CourtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $CourtRepository;

     public function __construct(CourtRepositoryInterface $CourtRepository)
     {
         $this->CourtRepository = $CourtRepository;
     }
    public function index()
    {
        //
        $data = $this->CourtRepository->index();
        // return response()->json($permissions);
        return $this->respondSuccess($data, 'Get Data successfully.');
    }

    public function getall(Request $request)
    {
        if ($request->ajax()) {
            $data = Court::select('*');
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
        $data = $this->CourtRepository->store($request);
        // return response()->json($nationalities);
        return $this->respondSuccess(result: $data, message: 'Store Data successfully.');
    }

    
   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Court  $court
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->CourtRepository->show($id);
        // return response()->json($data);
        return $this->respondSuccess($data, 'Get Data successfully.');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Court  $court
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->CourtRepository->show($id);
        // return response()->json($data);
        return $this->respondSuccess($data, message: 'Get Data successfully.');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCourtRequest  $request
     * @param  \App\Models\Court  $court
     * @return \Illuminate\Http\Response
     */
    public function update($id ,  Request $request)
    {
        //
        $data = $this->CourtRepository->update($id  ,$request);
        // return response()->json($data);
        return $this->respondSuccess($data, 'Update Data successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Court  $court
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = $this->CourtRepository->destroy($id);
        // return response()->json($data);
        return $this->respondSuccess($data, message: 'Delete Data successfully.');
    }
}
