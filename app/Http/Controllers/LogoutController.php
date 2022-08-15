<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(){
        Auth::user()->tokens()->delete();
        return response([
            'message'=>'Logged out sucessfully',
        ],Response::HTTP_OK);
    }
}
