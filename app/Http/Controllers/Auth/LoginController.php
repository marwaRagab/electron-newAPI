<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $messages = [
            'email.required' => 'الايميل  مطلوب.',
            'password.required' => 'كلمة المرور مطلوبة.',
        ];

        $validatedData = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ], $messages);

        if ($validatedData->fails()) {
            return $this->respondError('Validation Error.', $validatedData->errors(), 400);
        }
        $email = $request->email;
        $password = $request->password;
        // Check if the user exists
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($password, $user->password)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
        // Check if the user is active
        if ($user->active !== '1') {
            return $this->respondError('Validation Error.', ['not authorized' => ['لا يسمح لك بدخول النظام']], 400);
        }
        $credentials = $request->only('email', 'password');
        // Check if the user has logged in within the last two hours
        // $sixHoursAgo = now()->subHours(6);
        if (Auth::attempt($credentials)) {
            // If the user has logged in within the last two hours, do not set the code
            // if ($user->updated_at >= $sixHoursAgo) {
            //   $token=$user->createToken('auth_token')->accessToken;
            $token = $user->createToken('auth_token')->plainTextToken;
            Auth::login($user); // Log the user in
            // $user->device_token = $request->device_token;
            $user->token = $token; //->token;
            $user->save();
            $success['token'] = $token; //->token;
            $success['user'] = $user;
            return $this->respondSuccess($success, 'User login successfully.');
            //}
            /*else {


              $set = '123456789';
              $code = substr(str_shuffle($set), 0, 4);
              $input['code'] = $code;
              $msg = "يرجى التحقق من حسابك\nتفعيل الكود\n" . $code;

              send_sms_code($msg, $user->phone, $user->country_code);
              $user->code = $code;
              $user->save();
              $success['user'] = $user->only(['id', 'firstname', 'email', 'lastname', 'phone', 'country_code', 'code','image']);
              return $this->respondwarning($success, trans('message.account not verified'), ['account' => trans('message.account not verified')], 402);
          }*/
        }
        // return $this->respondError('password error', ['crediential' => ['كلمة المرور لا تتطابق مع سجلاتنا']], 403);
    }

    public function reset_password(Request $request)
    {
        $messages = [
            'email.required' => 'الايميل  مطلوب.',
            'password.required' => 'كلمة المرور مطلوبة.',

        ];

        $validatedData = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ], $messages);

        if ($validatedData->fails()) {
            return $this->respondError('Validation Error.', $validatedData->errors(), 400);
        }

        $user = User::where('email', $request->email)->first();


        if (!$user) {
            return $this->respondError('Validation Error.', ['email' => [' الايميل لا يتطابق مع سجلاتنا']], 400);
        }

        // can't use current password 
        // if (Hash::check($request->password, hashedValue: $user->password) == true) {
        //     return $this->respondError('Validation Error.', ['password' => ['لا يمكن أن تكون كلمة المرور الجديدة هي نفس كلمة المرور الحالية']], 400);
        // }

        // Update password and set token for first login if applicable
        $token = $user->createToken('auth_token')->plainTextToken;
        Auth::login($user); // Log the user in
        // $user->remember_token = $request->device_token;
        $user->token = $token; //->token;
        $user->password = Hash::make($request->password);
        $user->save();
    
        $success['token'] = $token;
        // $user->image = $user->image;
        $success['user']= $user;

        return $this->respondSuccess($success, 'reset password successfully.');
        
    }

    // public function checkCode(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'email' => 'required_without:userId',
    //         'code' => 'required|min:3',
    //     ]);

    //     if ($validator->fails()) {
    //         return $this->respondError('Validation Error.', $validator->errors(), 400);
    //     }
    //     $code = $request->code;
    //     $email = $request->email;
    //     // $userId = $request->military_number;
    //     $user = User::where(function ($query) use ($email, $code) {
    //         $query->where('email', $email)->where('code', $code);
    //     })->orWhere([
    //         ['id', $userId],
    //         ['code', $code]
    //     ])->first();
    //     if ($user) {
    //         return $this->respondSuccess(json_decode('{}'), 'الكود صحيح');
    //     } else {
    //         return $this->respondError('الكود غير صحيح', ['code' => ['الكود غير صحيح']], 401);
    //     }
    // }

    // public function resendCode(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'email' => 'required_without:userId',
    //     ]);

    //     if ($validator->fails()) {
    //         return $this->respondError('Validation Error.', $validator->errors(), 400);
    //     }
    //     $email = $request->email;
    //     $user = User::where(function ($query) use ($email) {
    //         if ($email) {
    //             $query->where('email', $email);
    //         }
    //     })->orWhere('id', $request->userId)->first();
    //     if ($user) {
    //         $set = '123456789';
    //         $code = substr(str_shuffle($set), 0, 4);
    //         $msg = "يرجى التحقق من حسابك\nتفعيل الكود\n" . $code;

    //         send_sms_code($msg, $user->phone, $user->country_code);
    //         $user->code = $code;
    //         $user->save();
    //         return $this->respondSuccess(json_decode('{}'), 'تم ارسال الرسالة بنجاح');
    //     } else {
    //         return $this->respondError('user not found', ['military_number' => ['مستخدم غير مسجل لدينا']], 400);
    //     }
    // }


    public function logout()
    {

        // dd(Auth::user());
        Auth::user()->tokens()->delete();;
        // $request->user()->tokens()->delete();
        return $this->respondSuccess(null, trans('تسجيل خروج'));
    }
}
