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
        $employeeDetails = $this->keyEmploymentDetails->create($employmentDetails);
        return $employeeDetails;
        
    }

}
