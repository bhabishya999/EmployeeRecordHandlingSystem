<?php

use Illuminate\Http\Response;

function responseHelper($message, int $code = Response::HTTP_OK , string $status = 'Success'){

    return response(
        [
        "message" => $message,
        "status" =>  $status,
        ], $code );
    
}
