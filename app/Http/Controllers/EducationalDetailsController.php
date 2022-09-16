<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeEducationalResource;
use App\Talent\EducationalDetails\Requests\EducationalDetailsRequest;
use App\Talent\EducationalDetails\Models\EducationalDetails;
use App\Talent\EducationalDetails\EducationalDetailsManager;
use App\Talent\EducationalDetails\Requests\EducationalDetailsEditRequest;
use Illuminate\Http\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\DB;

class EducationalDetailsController extends Controller
{
    public function __construct(private EducationalDetails $educationalDetails, private EducationalDetailsManager $educationalDetailsManager)
    {

    }

    public function store(EducationalDetailsRequest $request): Response|Application|ResponseFactory
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


    public function show($employeeId): EmployeeEducationalResource
    {
        $educationalDetails = $this->educationalDetailsManager->educationalProfile($employeeId);

        return new EmployeeEducationalResource($educationalDetails);
    }

    public function update(EducationalDetailsEditRequest $request,int $employee_id): Response|Application|ResponseFactory
    {
        $educationDetails = $request->validated();
        DB::transaction(function () use ($educationDetails,$employee_id) {
            foreach ($educationDetails['educational_details'] as $education) {
                if (empty($education['education_id'])) {
                    $this->educationalDetails->create(['employee_id' => $id,
                        'education_level' => $education['education_level'],
                        'passed_year' => $education['passed_year'], 'institution' => $education['institution']]);
                } else {
                    $this->educationalDetails->where('id', $education['education_id'])
                        ->update(['education_level' => $education['education_level'],
                            'passed_year' => $education['passed_year'], 'institution' => $education['institution']]);
                }
            }
            $educationDetailsIds = collect($educationDetails['educational_details'])->pluck('education_id');
            EducationalDetails::query()->whereNotIn('id', $educationDetailsIds)->delete();
        });
        return responseHelper('Educational details updated successfully');
    }
}
