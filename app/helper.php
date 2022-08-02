<?php

use Illuminate\Http\Response;

function notFound(){

    return response(
        [
        "message" => 'Token is Invalid or Expired!',
        "status" =>  'Failed'
        ], Response::HTTP_NOT_FOUND);
        
}

function conflict(){

    return response(
        [
        "message" => 'New password should not same as old password!',
        "status" =>  'Failed'
        ], Response::HTTP_CONFLICT );
    
}


function success($message){

    return response(
        [
        "message" => $message,
        "status" =>  'Success'
        ], Response::HTTP_OK );
    
}

