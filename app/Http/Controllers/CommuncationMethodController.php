<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use App\Models\CommuncationMethod;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreCommuncationMethodRequest;
use App\Http\Requests\UpdateCommuncationMethodRequest;
use App\Interfaces\CommuncationMethodRepositoryInterface;
use Illuminate\Support\Facades\Validator;


class CommuncationMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $CommuncationMethodRepository;

    public function __construct(CommuncationMethodRepositoryInterface $CommuncationMethodRepository)
    {
        $this->CommuncationMethodRepository = $CommuncationMethodRepository;
    }

    public function index()
    {
        $data = $this->CommuncationMethodRepository->index();

        if($data)
       {
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->date = now()->format('Y-m-d');
        $log->time = now()->format('h:i:s');
        $log->description ="تم دخول صفحة وسائل التواصل" ;
        $log->save();
       }
        // return response()->json($permissions);
        return $this->respondSuccess($data, 'Get Data successfully.');
    }

    public function getall(Request $request)
    {
        if ($request->ajax()) {
            $data = CommuncationMethod::select('*');
            return DataTables::of($data)->toJson();
        }
    }

    public function show($id)
    {
        $data = $this->CommuncationMethodRepository->show($id);

        if($data)
       {
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->date = now()->format('Y-m-d');
        $log->time = now()->format('h:i:s');
        $log->description ="تم عرض  وسيلة  {$data->name_ar} فى صفحة وسائل التواصل" ;
        $log->save();
       }
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
        
        $data = $this->CommuncationMethodRepository->store($request);
        if($data)
       {
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->date = now()->format('Y-m-d');
        $log->time = now()->format('h:i:s');
        $log->description ="تم اضافة وسيلة تواصل جديدة فى صفحة وسائل التواصل" ;
        $log->save();
       }
        // return response()->json($data);
        return $this->respondSuccess($data, 'Store Data successfully.');

    }

    public function edit($id)
    {
        $data = $this->CommuncationMethodRepository->show($id);

        if($data)
       {
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->date = now()->format('Y-m-d');
        $log->time = now()->format('h:i:s');
        $log->description ="تم الدخول  لتعديل  وسيلة تواصل  {$data->name_ar}   " ;
        $log->save();
       }
        // return response()->json($data);
        return $this->respondSuccess($data, 'Get Data successfully.');
    }

    public function update($id ,  Request $request)
    {
        //
        // dd($request-);
        $data = $this->CommuncationMethodRepository->update($id  ,$request);

        if($data)
       {
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->date = now()->format('Y-m-d');
        $log->time = now()->format('h:i:s');
        $log->description ="تم   تعديل  وسيلة تواصل  {$data->name_ar}   " ;
        $log->save();
       }
        // return response()->json($data);
        return $this->respondSuccess($data, 'Update Data successfully.');
    }


    public function destroy($id)
    {
        $data = $this->CommuncationMethodRepository->destroy($id);

        if($data)
       {
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->date = now()->format('Y-m-d');
        $log->time = now()->format('h:i:s');
        $log->description ="تم   مسح  وسيلة تواصل  {$data->name_ar}   " ;
        $log->save();
       }
        // return response()->json($data);
        return $this->respondSuccess($data, 'Delete Data successfully.');
    }
}
