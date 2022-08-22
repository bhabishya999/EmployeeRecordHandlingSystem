<?php

namespace App\Http\Controllers;
use App\Talent\KeyEmploymentDetails\KeyEmploymentDetailsManager;
use App\Talent\KeyEmploymentDetails\Models\KeyEmploymentDetails;
use App\Talent\KeyEmploymentDetails\Requests\StoreKeyEmploymentDetailsRequests;
use App\Talent\Employee\Model\Employee;

class KeyEmploymentDetailsController extends Controller
{
    public function __construct(private KeyEmploymentDetails $keyEmploymentDetails, private KeyEmploymentDetailsManager $keyEmploymentDetailsManager, private Employee $employee )
    {
        
    }
   
    public function store(StoreKeyEmploymentDetailsRequests $request)
    {
        $validation = $request->validated();
        $employmentDetails = $this->keyEmploymentDetailsManager->create($validation);
    }

}
