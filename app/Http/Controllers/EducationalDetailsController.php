<?php

namespace App\Http\Controllers;

use App\Talent\EducationalDetails\Requests\EducationalDetailsRequest;
use App\Talent\EducationalDetails\Models\EducationalDetails;
use App\Talent\EducationalDetails\EducationalDetailsManager;
use Illuminate\Http\Response;

class EducationalDetailsController extends Controller
{
    public function __construct(private EducationalDetails $educationalDetails, private EducationalDetailsManager $educationalDetailsManager)
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
        return responseHelper("Something went wrong!",Response::HTTP_NOT_FOUND, "Failed");
       }
       return response([
        "message" => "Educational Details Saved!", 
        "data" => $allEducationalDetails]);
    }
}
