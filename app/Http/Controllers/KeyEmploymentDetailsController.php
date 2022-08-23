<?php

namespace App\Http\Controllers;
use App\Talent\KeyEmploymentDetails\KeyEmploymentDetailsManager;
use App\Talent\KeyEmploymentDetails\Models\KeyEmploymentDetails;
use App\Talent\KeyEmploymentDetails\Requests\StoreKeyEmploymentDetailsRequests;

class KeyEmploymentDetailsController extends Controller
{
    public function __construct(private KeyEmploymentDetails $keyEmploymentDetails, private KeyEmploymentDetailsManager $keyEmploymentDetailsManager )
    {

    }

    public function store(StoreKeyEmploymentDetailsRequests $request):object
    {
        $validation = $request->validated();

        $employmentDetails = $this->keyEmploymentDetailsManager->create($validation);
        return $employmentDetails;
    }

}
