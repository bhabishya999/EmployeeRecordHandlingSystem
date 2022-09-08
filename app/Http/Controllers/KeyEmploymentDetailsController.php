<?php

namespace App\Http\Controllers;
use App\Http\Resources\EmployeeKeyEmploymentDetailResource;
use App\Talent\KeyEmploymentDetails\KeyEmploymentDetailsManager;
use App\Talent\KeyEmploymentDetails\Models\KeyEmploymentDetails;
use App\Talent\KeyEmploymentDetails\Requests\StoreKeyEmploymentDetailsRequests;
use App\Talent\Manages\ManagesManager;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class KeyEmploymentDetailsController extends Controller
{
    public function __construct(private KeyEmploymentDetails $keyEmploymentDetails, private KeyEmploymentDetailsManager $keyEmploymentDetailsManager, private ManagesManager $managesManager )
    {

    }

    public function store(StoreKeyEmploymentDetailsRequests $request): Response
    {
        $validation = $request->validated();

        $keyEmploymentDetailsArray= [];


         $employmentDetails = $this->keyEmploymentDetailsManager->create($validation);

         if(!$employmentDetails)
         {
            return responseHelper('Something Went Wrong, Please Try Again!', Response::HTTP_NOT_FOUND, 'Failed!');
         }
         array_push($keyEmploymentDetailsArray, $employmentDetails);

        foreach($validation['manages'] as $managesId)
        {

             $managersArray = [
                'key_employment_details_id'=> $employmentDetails->id,
                'employee_id'=>$managesId
            ];
            $manager = $this->managesManager->createManager($managersArray);

            if(!$manager)
            {
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

}
