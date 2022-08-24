<?php
namespace App\Talent\KeyEmploymentDetails;


use App\Talent\KeyEmploymentDetails\Models\KeyEmploymentDetails;
use Illuminate\Http\Response;
use Throwable;

class KeyEmploymentDetailsManager
{

    public function __construct(private KeyEmploymentDetails $keyEmploymentDetails)
    {

    }

    public function create(array $employmentDetails):object
    {
        try
        {
           $employeeDetails = $this->keyEmploymentDetails->create($employmentDetails);
           return $employeeDetails;

        }catch(Throwable)
        {
            
            return responseHelper('Something Went Wrong, Please Try Again Later', Response::HTTP_NOT_FOUND, 'Failed!');
        }
    }

}
