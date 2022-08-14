<?php

namespace App\Http\Controllers;

use App\Http\Requests\EducationalDetailsRequest;
use App\Models\EducationalDetails;
use App\Talent\EducationalDetails\EducationalDetailsManager;
use App\Talent\Employee\EmployeeManager;
use Illuminate\Http\Response;

class EducationalDetailsController extends Controller
{
    public function __construct(private EducationalDetails $educationalDetails, private EducationalDetailsManager $educationalDetailsManager, private EmployeeManager $employee)
    {
    }

    public function store(EducationalDetailsRequest $request)
    {
        
        $educationDetails = $request->validated();
        $idArr = [];

        
        foreach($educationDetails['educational_details'] as $details){

            array_push($idArr, $details['employee_id']);  

        }
       
       $employeeDetails =  $this->employee->findById($idArr[0]);

       if(!$employeeDetails){

        return responseHelper("Personal Details Not Filled", Response::HTTP_NOT_FOUND, 'Failed');

       }

       $educationalDetailsValidation = $this->educationalDetailsManager->findByForeginKey($idArr[0]); 

       if($educationalDetailsValidation){

        return responseHelper("Educational Details Already Filled!");

       }
        
        
        $allEducationalDetails = [];

        foreach ($educationDetails['educational_details'] as $education )
        {

            $educationalDetailsResponse =$this->educationalDetailsManager->create($education);

            array_push($allEducationalDetails, $educationalDetailsResponse);
        }
       
       if(!$educationalDetailsResponse)
       {

            return responseHelper('Some Thing Went Wrong, Please Try Again!', Response::HTTP_BAD_REQUEST , 'Failed');

       }
       
       return responseHelper('Ok!');
    
    }
}
