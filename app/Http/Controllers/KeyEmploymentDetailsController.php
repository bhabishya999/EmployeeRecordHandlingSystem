<?php

namespace App\Http\Controllers;


use App\Talent\KeyEmploymentDetails\KeyEmploymentDetailsManager;
use App\Talent\KeyEmploymentDetails\Models\KeyEmploymentDetails;
use App\Talent\KeyEmploymentDetails\Requests\StoreKeyEmploymentDetailsRequests;

use App\Talent\Manages\ManagesManager;
use App\Talent\Manages\Models\Manages;
use App\Talent\Manages\Requests\StoreManagesRequests;


class KeyEmploymentDetailsController extends Controller
{
    public function __construct(private KeyEmploymentDetails $keyEmploymentDetails, private KeyEmploymentDetailsManager $keyEmploymentDetailsManager, private Manages $manages, private ManagesManager $managesManager )
    {
        
    }
   
    public function store(StoreKeyEmploymentDetailsRequests $request)
    {
        $validation = $request->validated();

        $employmentDetails = $this->keyEmploymentDetailsManager->create($validation);
        dd($employmentDetails);

    }
}
