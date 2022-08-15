<?php

namespace App\Http\Controllers;

use App\Talent\EducationalDetails\Requests\EducationalDetailsRequest;
use App\Talent\EducationalDetails\Models\EducationalDetails;
use App\Talent\EducationalDetails\EducationalDetailsManager;
use App\Talent\Employee\EmployeeManager;
use Carbon\Carbon;
use Illuminate\Http\Response;

class EducationalDetailsController extends Controller
{
    public function __construct(private EducationalDetails $educationalDetails, private EducationalDetailsManager $educationalDetailsManager, private EmployeeManager $employee)
    {
    }

    public function store(EducationalDetailsRequest $request)
    {
        
        $educationDetails = $request->validated();
        
        $allEducationalDetails = [];

        foreach ($educationDetails['educational_details'] as $education )
        {

            $educationalDetailsResponse =$this->educationalDetailsManager->create($education);

            array_push($allEducationalDetails, $educationalDetailsResponse);
        }
       
       if(count($educationDetails) <= 0)
       {

            return responseHelper('Some Thing Went Wrong, Please Try Again!', Response::HTTP_BAD_REQUEST , 'Failed');

       }
       
       return responseHelper('Ok!');
    
    }
}
