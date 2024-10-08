<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionCompleted;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Interfaces\TransactionsCompletedRepositoryInterface;

class TransactionsCompletedController extends Controller
{
    protected $transactionsCompletedRepository;

    public function __construct(TransactionsCompletedRepositoryInterface $transactionsCompletedRepository)
    {
        $this->transactionsCompletedRepository = $transactionsCompletedRepository;
    }

    public function index()
    {
        $data = $this->transactionsCompletedRepository->index();
        // return response()->json($permissions);
        return $this->respondSuccess($data, 'Get Data successfully.');
    }

    public function getall(Request $request)
    {
        if ($request->ajax()) {
            $data = TransactionCompleted::select('*');
            return DataTables::of($data)->toJson();
        }
    }

    public function show($id)
    {
        $data = $this->transactionsCompletedRepository->show($id);
        // return response()->json($data);
        return $this->respondSuccess($data, 'Get Data successfully.');
        
    }

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
        
        $data = $this->transactionsCompletedRepository->store($request);
        // return response()->json($data);
        return $this->respondSuccess($data, 'Store Data successfully.');

    }

    public function edit($id)
    {
        $data = $this->transactionsCompletedRepository->show($id);
        // return response()->json($data);
        return $this->respondSuccess($data, 'Get Data successfully.');
    }

    public function update($id ,  Request $request)
    {
        //
        // dd($request-);
        $data = $this->transactionsCompletedRepository->update($id  ,$request);
        // return response()->json($data);
        return $this->respondSuccess($data, 'Update Data successfully.');
    }


    public function destroy($id)
    {
        $data = $this->transactionsCompletedRepository->destroy($id);
        // return response()->json($data);
        return $this->respondSuccess($data, 'Delete Data successfully.');
    }
}
