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
    
       
}
