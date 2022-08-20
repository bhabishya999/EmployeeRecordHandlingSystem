<?php
namespace App\Talent\KeyEmploymentDetails;
use App\Talent\KeyEmploymentDetails\Models\KeyEmploymentDetails;
use Illuminate\Http\Response;
use Throwable;

class KeyEmploymentDetailsManager{

   public function __construct(private KeyEmploymentDetails $keyEmploymentDetails)
   {
    
   }

   public function create(array $employmentDetails)
   {
      try
      {
        $employeeDetails = $this->KeyEmploymentDetails->create($employmentDetails);
        return $employeeDetails;

      }catch(Throwable $error)
      {
         responseHelper($error, Response::HTTP_BAD_REQUEST, "Failed");
      }
   }
}