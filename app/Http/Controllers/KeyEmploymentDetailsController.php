<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeKeyEmploymentDetailResource;
use App\Talent\KeyEmploymentDetails\KeyEmploymentDetailsManager;
use App\Talent\KeyEmploymentDetails\Models\KeyEmploymentDetails;
use App\Talent\KeyEmploymentDetails\Requests\EditKeyEmploymentDetailsRequest;
use App\Talent\KeyEmploymentDetails\Requests\StoreKeyEmploymentDetailsRequests;
use App\Talent\Manages\ManagesManager;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Throwable;

class KeyEmploymentDetailsController extends Controller
{
    public function __construct(private KeyEmploymentDetails $keyEmploymentDetails, private KeyEmploymentDetailsManager $keyEmploymentDetailsManager, private ManagesManager $managesManager)
    {

    }

    public function store(StoreKeyEmploymentDetailsRequests $request): Response
    {
        $validation = $request->validated();

        $keyEmploymentDetailsArray = [];


        $employmentDetails = $this->keyEmploymentDetailsManager->create($validation);

        if (!$employmentDetails) {
            return responseHelper('Something Went Wrong, Please Try Again!', Response::HTTP_NOT_FOUND, 'Failed!');
        }
        array_push($keyEmploymentDetailsArray, $employmentDetails);

        foreach ($validation['manages'] as $managesId) {

            $managersArray = [
                'key_employment_details_id' => $employmentDetails->id,
                'employee_id' => $managesId
            ];
            $manager = $this->managesManager->createManages($managersArray);

            if (!$manager) {
                return responseHelper('Something Went Wrong, Please Try Again!', Response::HTTP_NOT_FOUND, 'Failed!');
            }
            array_push($keyEmploymentDetailsArray, $manager);
        }

        return responseHelper("Key Employment Details Successfully Saved!");
    }

    public function show($employeeId)
    {
        $keyEmploymentDetails = $this->keyEmploymentDetailsManager->keyEmploymentProfile($employeeId);

        return new EmployeeKeyEmploymentDetailResource($keyEmploymentDetails);
    }

    public function employmentUpdate(EditKeyEmploymentDetailsRequest $request, $employeeId)
    {
        try {
            $this->keyEmploymentDetails->findorFail($employeeId);
        } catch (Throwable) {
            return responseHelper('Sorry,could not found this user', Response::HTTP_NOT_FOUND, 'Failed');
        }
        $validated = $request->validated();
        DB::transaction(function () use ($validated, $employeeId) {
            $employmentArray = [
                'organization' => $validated['organization'],
                'join_date' => $validated['join_date'],
                'current_position' => $validated['current_position'],
                'work_schedule' => $validated['work_schedule'],
                'team' => $validated['team'],
                'manager' => $validated['manager'],
                'superpowers' => $validated['superpowers']
            ];
            $employmentUpdate = $this->keyEmploymentDetailsManager->update($employmentArray, $employeeId);
            $this->managesUpdate($validated, $employeeId);
        });
        return responseHelper('Key-employment Details updated successfully');
    }

    public function managesUpdate($validated, $employeeId)
    {
        DB::transaction(function () use ($validated, $employeeId) {
        //There is no option to delete manages field in design so,I haven't implemented that here
            foreach ($validated['manages'] as $manage) {
                if (empty($manage['manages_id'])) {
                    $managesArray = [
                        'key_employment_details_id' => $employeeId,
                        'employee_id' => $manage['employee_id']
                    ];
                    $managesUpdate=$this->managesManager->createManages($managesArray);
                }
            }
        });
    }
}
