<?php

use Illuminate\Http\Response;

function responseHelper($message, int $code = Response::HTTP_OK , string $status = 'Success'){

    return response(
        [
        "message" => $message,
        "status" =>  $status,
        ], $code );
    
}


function failed(string $message, int $code = Response::HTTP_NOT_FOUND){

    return response(
        [
        "message" => $message,
        "status" =>  'Failed'
        ], $code );
    
}
