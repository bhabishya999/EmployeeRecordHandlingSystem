<?php
namespace App\Talent\EducationalDetails;
use App\Models\User;
use App\Models\EducationalDetails;

class EducationalDetailsManager
{
    public function __construct(private EducationalDetails $educationalDetails)
    {

    }
    
    public function store(string $email,string $token)
    {
        $passwordReset= $this->passwordReset->create(['email'=>$email,
        'token'=>$token]);
    }    
}
