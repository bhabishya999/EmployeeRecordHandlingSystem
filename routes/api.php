<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Http\Request;
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
Route::post('/reset-password',[PasswordResetController::class, 'reset']);
Route::get('/validate-token', [PasswordResetController::class, 'validateToken']);
Route::middleware('auth:sanctum')->post('/logout',[LogoutController::class,'logout']);
Route::post('/forget-password', [ForgotPasswordController::class,'resetEmail']);
