<?php

namespace App\Http\Controllers;

use App\Models\Ministry;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreMinistryRequest;
use App\Http\Requests\UpdateMinistryRequest;
use App\Interfaces\MinistryRepositoryInterface;


class MinistryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $MinistryRepository;

    public function __construct(MinistryRepositoryInterface $MinistryRepository)
    {
        $this->MinistryRepository = $MinistryRepository;
    }
    public function index()
    {
        // dd("dd");
        $data = $this->MinistryRepository->index();
        // return response()->json($permissions);
        return $this->respondSuccess($data, 'Get Data successfully.');
    }

    public function getall(Request $request)
    {
        if ($request->ajax()) {
            $data = Ministry::select('*');
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePermissionRequest  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $messages = [
            'name_ar.required' => 'الاسم بالعربى  مطلوب.',
            'name_en.required' => 'الاسم بالانجليزية  مطلوب.',
            'date.required' => 'التاريخ   مطلوب.',
            // 'percent.required' => 'النسب   مطلوب.',
        ];

        $validatedData = Validator::make($request->all(), [
            'name_ar' => 'required',
            'name_en' => 'required',
            'date'=>'required',
            // 'percent'=>'required',
        ], $messages);

        if ($validatedData->fails()) {

            return $this->respondError('Validation Error.', $validatedData->errors(), 400);
        }
        
        $data = $this->MinistryRepository->store($request);
        // return response()->json($data);
        return $this->respondSuccess($data, 'Store Data successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->MinistryRepository->show($id);
        // return response()->json($data);
        return $this->respondSuccess($data, 'Get Data successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->MinistryRepository->show($id);
        // return response()->json($data);
        return $this->respondSuccess($data, 'Get Data successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePermissionRequest  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update($id ,  Request $request)
    {
        //
        // dd($request-);
        $data = $this->MinistryRepository->update($id  ,$request);
        // return response()->json($data);
        return $this->respondSuccess($data, 'Update Data successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = $this->MinistryRepository->destroy($id);
        // return response()->json($data);
        return $this->respondSuccess($data, 'Delete Data successfully.');
    }
}
