<?php

use Illuminate\Http\Response;

function success($message, int $code = Response::HTTP_OK  ){

    return response(
        [
        "message" => $message,
        "status" =>  'Success'
        ], $code );
    
}


function failed(string $message, int $code = Response::HTTP_NOT_FOUND){

    return response(
        [
        "message" => $message,
        "status" =>  'Failed'
        ], $code );
    
}
