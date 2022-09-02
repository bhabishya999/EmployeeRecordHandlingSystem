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

    public function keyEmploymentProfile($employee_id)
    {
        return $this->employee->with(['keyEmploymentDetail','keyEmploymentDetail.manages'])->findOrFail($employee_id);
    }

}
