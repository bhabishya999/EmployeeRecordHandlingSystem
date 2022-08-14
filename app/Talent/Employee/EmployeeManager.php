<?php
namespace App\Talent\Employee;

use App\Models\Document;
use App\Models\Employee;

class EmployeeManager
{
    public function __construct(private Employee $employee, private Document $document)
    {

    }
    
    public function details_store(string $firstname,string $lastname,string $email,string $country_code,int $contact_number,string $date_of_birth,
    string $current_address,int $pan_number,int $bank_account_number,string $name)
    {
        $employee= $this->employee->create([
        'first_name'=>$firstname,
        'last_name'=>$lastname,
        'email'=>$email,
        'country_code'=>$country_code,
        'contact_number'=>$contact_number,
        'date_of_birth'=>$date_of_birth,
        'current_address'=>$current_address,
        'pan_number'=>$pan_number,
        'bank_account_number'=>$bank_account_number,
        'avatar'=>$name
    ]);
    }    
    public function document_store(string $name,string $type,string $path,int $employee_id){
        $document=$this->document->create([
            'name'=>$name,
            'type'=>$type,
            'path'=>$path,
            'employee_id'=>$employee_id
        ]);
    }
    public function findbyEmail(string $email):int{
        $email=$this->employee->where('email',$email)->first();
        return $email->id;
    }

}
