<?php

namespace App\Http\Controllers;

use App\Talent\KeyEmploymentDetails\Models\KeyEmploymentDetails;
use App\Talent\KeyEmploymentDetails\Requests\StoreKeyEmploymentDetailsRequests;
use App\Talent\KeyEmploymentDetails\KeyEmploymentDetailsManager;


class KeyEmploymentDetailsController extends Controller
{
    public function __construct(private KeyEmploymentDetails $keyEmploymentDetails, private KeyEmploymentDetailsManager $keyEmploymentDetailsManager)
    {
        
    }
   
    public function store(StoreKeyEmploymentDetailsRequests $request)
    {
        $validation = $request->validated();

    }
}
