<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\GovernorateController;
use App\Http\Controllers\NationalityController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::post('/login', [LoginController::class, 'login']); // Login and get a token
Route::post('/reset-password', [LoginController::class, 'reset_password']); // Reset password


Route::middleware('auth:sanctum')->get('/user', action: function (Request $request) {
    dd("dd");
    return $request->user();
});



// Route::get('get-nationalities', [NationalityController::class, 'getall']);
// Route::get('/nationality', [NationalityController::class, 'index']);
// Route::post('/nationality', [NationalityController::class, 'store']);
// Route::get('/nationality/{product}/edit', [NationalityController::class, 'edit']);
// Route::put('/nationality/{product}', [NationalityController::class, 'update']);
// Route::apiResource('user', LoginController::class);
// New API resource group with middleware
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('nationalities', NationalityController::class);
    Route::apiResource('permissions', PermissionController::class);
    Route::post('/check-code', [LoginController::class, 'checkCode']); // Check code
    Route::post('/resend-code', [LoginController::class, 'resendCode']); // Resend code
    Route::post('/logout', [LoginController::class, 'logout']); // Logout
    Route::apiResource('roles', RoleController::class);
    Route::apiResource('governorates', GovernorateController::class);
    Route::apiResource('courts', CourtController::class);
    
});
