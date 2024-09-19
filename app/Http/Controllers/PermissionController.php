<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Interfaces\PermissionRepositoryInterface;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $PermissionRepository;

    public function __construct(PermissionRepositoryInterface $PermissionRepository)
    {
        $this->PermissionRepository = $PermissionRepository;
    }
    public function index()
    {
        // dd("dd");
        $permissions = $this->PermissionRepository->index();
        // return response()->json($permissions);
        return $this->respondSuccess($permissions, 'Get Data successfully.');
    }

    public function getall(Request $request)
    {
        if ($request->ajax()) {
            $data = Permission::select('*');
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'title_ar.required' => 'العنوان بالعربى  مطلوب.',
            'title_en.required' => 'العنوان بالانجليزية  مطلوب.',
        ];

        $validatedData = Validator::make($request->all(), [
            'title_ar' => 'required',
            'title_en' => 'required',
        ], $messages);

        if ($validatedData->fails()) {

            return $this->respondError('Validation Error.', $validatedData->errors(), 400);
        }
        
        $data = $this->PermissionRepository->store($request);
        // return response()->json($data);
        return $this->respondSuccess($data, message: 'Store Data successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->PermissionRepository->show($id);
        // return response()->json($data);
        return $this->respondSuccess( $data, 'Get Data successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->PermissionRepository->show($id);
        // return response()->json($data);
        return $this->respondSuccess($data, message: 'Get Data successfully.');
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
        $data = $this->PermissionRepository->update($id  ,$request);
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
        $data = $this->PermissionRepository->destroy($id);
        // return response()->json($data);
        return $this->respondSuccess($data, message: 'Delete Data successfully.');
    }
}
