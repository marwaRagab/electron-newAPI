<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Nationality;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreNationalityRequest;
use App\Http\Requests\UpdateNationalityRequest;
use App\Interfaces\NationalityRepositoryInterface;

class NationalityController extends Controller
{
    protected $NationalityRepository;

    public function __construct(NationalityRepositoryInterface $NationalityRepository)
    {
        $this->NationalityRepository = $NationalityRepository;
    }
    public function index()
    {
        // dd("dd");
        $data = $this->NationalityRepository->index();
        // return response()->json($permissions);
        return $this->respondSuccess($data, 'Get Data successfully.');
    }

    

     
    // public function index(Request $request)
    // {
    //     $nationalities = $this->NationalityRepository->index($request);

    //     // dd($request->ajax());

    //     // if ($request->ajax() ) {
            
    //         // dd("true");
    //     //     return DataTables::of($nationalities)
    //     //     ->addColumn('action', function ($row) {
    //     //         return '<a href="#" class="btn btn-info" onclick="viewNationality(' . $row->id . ')">View</a>
    //     //                 <a href="/nationalities/' . $row->id . '/edit" class="btn btn-primary">Edit</a>
    //     //                 <button class="btn btn-danger" onclick="deleteNationality(' . $row->id . ')">Delete</button>';
    //     //     })
    //     //         ->rawColumns(['action'])
    //     //         ->make(true);
    //     // }
    
    //     // return Inertia::render('NationalityManager');
    //     return response()->json($nationalities);
    // }

    public function getall(Request $request)
    {
        if ($request->ajax()) {
            $data = Nationality::select('*');
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
     * @param  \App\Http\Requests\StoreNationalityRequest  $request
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
        $data = $this->NationalityRepository->store($request);
        // return response()->json($nationalities);
        return $this->respondSuccess(result: $data, message: 'Store Data successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->NationalityRepository->show($id);
        // return response()->json($data);
        return $this->respondSuccess($data, 'Get Data successfully.');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->NationalityRepository->show($id);
        // return response()->json($data);
        return $this->respondSuccess($data, message: 'Get Data successfully.');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNationalityRequest  $request
     * @param  \App\Models\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function update($id ,  Request $request)
    {
        //
        $data = $this->NationalityRepository->update($id  ,$request);
        // return response()->json($data);
        return $this->respondSuccess($data, 'Update Data successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = $this->NationalityRepository->destroy($id);
        // return response()->json($data);
        return $this->respondSuccess($data, message: 'Delete Data successfully.');
    }
}
