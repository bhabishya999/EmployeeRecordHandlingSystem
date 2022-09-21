<?php
namespace App\Talent\KeyEmploymentDetails;

use App\Talent\Employee\Model\Employee;
use App\Talent\KeyEmploymentDetails\Models\KeyEmploymentDetails;
use phpDocumentor\Reflection\Types\Collection;

class KeyEmploymentDetailsManager
{

    public function __construct(private KeyEmploymentDetails $keyEmploymentDetails, private Employee $employee)
    {

    }

    public function create(array $employmentDetails):object
    {
        $employeeDetails = $this->keyEmploymentDetails->create($employmentDetails);
        return $employeeDetails;

    }

    public function keyEmploymentProfile($employeeId)
    {
        return $this->employee->with(['keyEmploymentDetail','keyEmploymentDetail.manages'])->findOrFail($employeeId);
    }

    public function update($employmentArray,$employeeId){
        return $this->keyEmploymentDetails->where('employee_id',$employeeId)->update($employmentArray);
    }
}
