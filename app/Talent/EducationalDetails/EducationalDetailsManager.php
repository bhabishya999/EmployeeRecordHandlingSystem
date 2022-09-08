<?php
namespace App\Talent\EducationalDetails;
use App\Talent\EducationalDetails\Models\EducationalDetails;
use App\Talent\Employee\Model\Employee;
use Illuminate\Http\Response;
use Throwable;

class EducationalDetailsManager
{
    public function __construct(private EducationalDetails $educationalDetails, private Employee $employee)
    {

    }

    public function create(array $educationDetails):EducationalDetails
    {
        try
        {
            $datas = $this->educationalDetails->create($educationDetails);
            return $datas;

        }catch(Throwable)
        {
            return responseHelper('Something Went Wrong Please Try Again!', Response::HTTP_BAD_REQUEST, "Failed!");
        }
    }

    public function educationalProfile($employee_id)
    {
        return $this->employee->with('educationalDetail')->findOrFail($employee_id);
    }
}
