<?php
namespace App\Talent\EducationalDetails;
use App\Models\EducationalDetails;

class EducationalDetailsManager
{
    public function __construct(private EducationalDetails $educationalDetails)
    {

    }

    public function create(array $educationDetails){
      
        $datas = $this->educationalDetails->create($educationDetails);
        return $datas;

    }

    public function findByForeginKey(int $employee_id):void{

        $this->educationalDetails->where('employee_id', '=', $employee_id)->first();
        
       

    }
    
       
}
