<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeEducationalResource;
use App\Talent\EducationalDetails\Requests\EducationalDetailsRequest;
use App\Talent\EducationalDetails\Models\EducationalDetails;
use App\Talent\EducationalDetails\EducationalDetailsManager;
use App\Talent\EducationalDetails\Requests\EducationalDetailsEditRequest;

class EducationalDetailsController extends Controller
{
    public function __construct(private EducationalDetails $educationalDetails, private EducationalDetailsManager $educationalDetailsManager)
    {

    }

    public function store(EducationalDetailsRequest $request)
    {

        $educationDetails = $request->validated();

        $allEducationalDetails = [];

        foreach ($educationDetails['educational_details'] as $education) {

            $educationalDetailsResponse = $this->educationalDetailsManager->create($education);
            array_push($allEducationalDetails, $educationalDetailsResponse);

        }

        return response([

            "message" => "Educational Details Saved!",
            "data" => $allEducationalDetails
        ]);
    }


    public function show($employeeId)
    {
        $educationalDetails = $this->educationalDetailsManager->educationalProfile($employeeId);

        return new EmployeeEducationalResource($educationalDetails);
    }

    public function update(EducationalDetailsEditRequest $request)
    {
        $educationDetails = $request->validated();
        foreach ($educationDetails['educational_details'] as $education) {
            $this->educationalDetails->updateOrCreate(['id'=>$education['education_id']],['employee_id'=>$education['employee_id'],'education_level' => $education['education_level'],
                'passed_year' => $education['passed_year'], 'institution' => $education['institution']]);
        }
        return responseHelper('Educational details updated successfully');
    }
}
