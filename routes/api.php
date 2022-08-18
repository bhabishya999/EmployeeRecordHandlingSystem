<?php

use App\Http\Controllers\EmployeeController;


use App\Http\Controllers\EducationalDetailsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordResetController;


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

Route::post('/login',[LoginController::class,'login']);
Route::middleware(['auth:sanctum'])->post('/logout',[LogoutController::class,'logout']);

Route::group(['prefix' => 'reset-password'], function(){
    Route::post('/',[PasswordResetController::class, 'reset']);
    Route::get('/validate-token', [PasswordResetController::class, 'validateToken']);
});

Route::post('/send-email', [ForgotPasswordController::class,'resetEmail']);

Route::group(['prefix' => 'employee', 'middleware' => ['auth:sanctum']], function() {
    Route::post('/', [EmployeeController::class,'store']);
});
Route::prefix('forgot-password')->group(function () {
    Route::post('/send-email', [ForgotPasswordController::class,'resetEmail']);
    Route::post('/reset-password',[PasswordResetController::class, 'reset']);
    Route::get('/validate-token', [PasswordResetController::class, 'validateToken']);
});

Route::post('/educational-details', [EducationalDetails::class, 'store']);
