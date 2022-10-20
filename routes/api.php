<?php

use App\Http\Controllers\EducationalDetailsController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeImportController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\KeyEmploymentDetailsController;
use App\Http\Controllers\ManagerListController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\LeaveFormSyncController;

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
Route::middleware('auth:sanctum')->post('/logout',[LogoutController::class,'logout']);

Route::group(['prefix' => 'employees', 'middleware' => ['auth:sanctum']], function(){
    Route::post('/educations', [EducationalDetailsController::class, 'store']);
    Route::post('/', [EmployeeController::class,'store']);
    Route::get('/managers',[ManagerListController::class,'index']);
    Route::get('/',[EmployeeController::class,'index']);
    Route::post('/key-employment-details', [KeyEmploymentDetailsController::class, 'store']);
    Route::get('/educations/{employeeId}', [EducationalDetailsController::class, 'show']);
    Route::get('/profile/{employeeId}', [EmployeeController::class, 'show']);
    Route::get('/key-employment-details/{employeeId}', [KeyEmploymentDetailsController::class, 'show']);
    Route::post('/import', [ImportController::class,'import']);
    Route::put('/education-update/{employeeId}',[EducationalDetailsController::class,'update']);
    Route::post('/{employeeId}', [EmployeeController::class,'userUpdate']);
    Route::put('/key-employment-details/{employeeId}', [KeyEmploymentDetailsController::class,'employmentUpdate']);
    Route::put('/status/{employeeId}',[EmployeeController::class,'statusUpdate']);
    Route::get('/leaves', [LeaveRequestController::class,'index']);
});
Route::group(['prefix' => 'user', 'middleware' => ['auth:sanctum']], function(){
    Route::get('/me',[UserController::class,'show']);
});
Route::post('/forgot-password', [ForgotPasswordController::class,'resetEmail']);
Route::post('/reset-password',[PasswordResetController::class, 'reset']);
Route::get('/validate-token', [PasswordResetController::class, 'validateToken']);
Route::post('/employee-leaves', [LeaveRequestController::class,'store']);

