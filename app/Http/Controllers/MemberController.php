<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
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


    public function show($id)
    {
        $data = $this->CourtRepository->show($id);
        // return response()->json($data);
        return $this->respondSuccess($data, 'Get Data successfully.');

    }

    public function edit($id)
    {
        $data = $this->CourtRepository->show($id);
        // return response()->json($data);
        return $this->respondSuccess($data, message: 'Get Data successfully.');

    }

    public function update($id ,  Request $request)
    {
        //
        $data = $this->CourtRepository->update($id  ,$request);
        // return response()->json($data);
        return $this->respondSuccess($data, 'Update Data successfully.');

    }

    public function destroy($id)
    {
        //
        $data = $this->CourtRepository->destroy($id);
        // return response()->json($data);
        return $this->respondSuccess($data, message: 'Delete Data successfully.');
    }
}
