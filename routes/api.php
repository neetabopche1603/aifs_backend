<?php

use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\registerController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::controller(registerController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/verify-otp', 'verify_otp');
    Route::get('get-category', 'loan_categories');
    Route::post('save-loan-data', 'loan_data');
    Route::post('/aadhar-upload', 'aadhar_upload');
    Route::post('pan-upload', 'pan_upload');
    Route::post('bank-data-save', 'back_details');
});

Route::controller(LoginController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('login/verify-otp', 'verify_otp');
});

Route::controller(UserController::class)->group(function () {
    Route::post('/profile_update', 'userprofileUpdate');
    Route::post('kyc-document','kycDocument');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
