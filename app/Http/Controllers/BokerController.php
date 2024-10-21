<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Boker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBokerRequest;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\UpdateBokerRequest;
use Illuminate\Support\Facades\Validator;
use App\Interfaces\BokerRepositoryInterface;

class BokerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $BokerRepository;

    public function __construct(BokerRepositoryInterface $BokerRepository)
    {
        $this->BokerRepository = $BokerRepository;
    }
   public function index()
   {
       //
       $data = $this->BokerRepository->index();
       if($data)
       {
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->date = now()->format('Y-m-d');
        $log->time = now()->format('h:i:s');
        $log->description ="تم دخول صفحة الوسطاء" ;
        $log->save();
       }
       // return response()->json($permissions);
       return $this->respondSuccess($data, 'Get Data successfully.');
   }

   public function getall(Request $request)
   {
       if ($request->ajax()) {
           $data = Boker::select('*');
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
           'phone.required' => 'رقم الهاتف مطلوب.',
           'percentage.required' => 'النسبة  مطلوب.',
           'percentage_amount.required' => 'نوع النسبة مطلوب'
       ];

       $validatedData = Validator::make($request->all(), [
           'name_ar' => 'required',
           'name_en' => 'required',
           'phone' =>'required',
           'percentage' =>'required',
           'percentage_amount' =>'required'
       ], $messages);

       if ($validatedData->fails()) {

           return $this->respondError('Validation Error.', $validatedData->errors(), 400);
       }
       $data = $this->BokerRepository->store($request);
       if($data)
       {
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->date = now()->format('Y-m-d');
        $log->time = now()->format('h:i:s');
        $log->description ="تم اضافة وسيط  جديد فى صفحة الوسطاء" ;
        $log->save();
       }
       // return response()->json($nationalities);
       return $this->respondSuccess(result: $data, message: 'Store Data successfully.');
   }

   
  

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Boker  $Boker
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       $data = $this->BokerRepository->show($id);
       if($data)
       {
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->date = now()->format('Y-m-d');
        $log->time = now()->format('h:i:s');
        $log->description ="تم عرض  وسيط  {$data->name_ar} فى صفحة الوسطاء" ;
        $log->save();
       }
       // return response()->json($data);
       return $this->respondSuccess($data, 'Get Data successfully.');

   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Boker  $Boker
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       $data = $this->BokerRepository->show($id);

       if($data)
       {
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->date = now()->format('Y-m-d');
        $log->time = now()->format('h:i:s');
        $log->description ="تم الدخول  لتعديل  وسيط  {$data->name_ar}   " ;
        $log->save();
       }
       // return response()->json($data);
       return $this->respondSuccess($data, message: 'Get Data successfully.');

   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateBokerRequest  $request
    * @param  \App\Models\Boker  $Boker
    * @return \Illuminate\Http\Response
    */
   public function update($id ,  Request $request)
   {
       //
       $data = $this->BokerRepository->update($id  ,$request);

       if($data)
       {
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->date = now()->format('Y-m-d');
        $log->time = now()->format('h:i:s');
        $log->description ="تم   تعديل  وسيط  {$data->name_ar}   " ;
        $log->save();
       }
       // return response()->json($data);
       return $this->respondSuccess($data, 'Update Data successfully.');

   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Boker  $Boker
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       //
       $data = $this->BokerRepository->destroy($id);
       if($data)
       {
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->date = now()->format('Y-m-d');
        $log->time = now()->format('h:i:s');
        $log->description ="تم   مسح  وسيط  {$data->name_ar}   " ;
        $log->save();
       }
       // return response()->json($data);
       return $this->respondSuccess($data, message: 'Delete Data successfully.');
   }
}
