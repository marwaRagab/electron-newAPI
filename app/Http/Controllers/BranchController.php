<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreBranchRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateBranchRequest;
use App\Interfaces\BranchRepositoryInterface;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $BranchRepository;

    public function __construct(BranchRepositoryInterface $BranchRepository)
    {
        $this->BranchRepository = $BranchRepository;
    }
    public function index()
    {
        // dd("dd");
        $permissions = $this->BranchRepository->index();
        // return response()->json($permissions);
        return $this->respondSuccess($permissions, 'Get Data successfully.');
    }

    public function getall(Request $request)
    {
        if ($request->ajax()) {
            $data = Branch::select('*');
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
            'name_ar.required' => 'الاسم بالعربى  مطلوب.',
            'name_en.required' => 'الاسم بالانجليزية  مطلوب.',
        ];

        $validatedData = Validator::make($request->all(), [
            'name_ar' => 'required',
            'name_en' => 'required',
        ], $messages);

        if ($validatedData->fails()) {

            return $this->respondError('Validation Error.', $validatedData->errors(), 400);
        }
        
        $data = $this->BranchRepository->store($request);
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
        $data = $this->BranchRepository->show($id);
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
        $data = $this->BranchRepository->show($id);
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
        $data = $this->BranchRepository->update($id  ,$request);
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
        $data = $this->BranchRepository->destroy($id);
        // return response()->json($data);
        return $this->respondSuccess($data, 'Delete Data successfully.');
    }
}
