<?php
namespace App\Talent\Employee;
use App\Talent\Employee\Model\Employee;
class EmployeeManager
{
    public function __construct(private Employee $employee)
    {

    }

    public function store(array $employeeArray):Employee
    {
        $employee= $this->employee->create($employeeArray);
        return $employee;
    }
    public function employeeList():object
    {
        $employeeList=$this->employee->get();
        return $employeeList;
    }
}
