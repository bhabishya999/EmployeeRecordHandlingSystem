<?php
namespace App\Talent\Employee;

use App\Models\Employee;

class EmployeeManager
{
    public function __construct(private Employee $employee)
    {

    }
    
    public function create(array $employeeArray):Employee
    {
        $employee= $this->employee->create($employeeArray);
        return $employee;
    }    

    public function findbyEmail(string $email):int{
        $email=$this->employee->where('email',$email)->first();
        return $email->id;
    }

}
