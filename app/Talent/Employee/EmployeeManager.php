<?php
namespace App\Talent\Employee;
use App\Talent\Employee\Model\Employee;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

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

    public function employeeList(int $perPage):LengthAwarePaginator
    {
        return $this->employee->with('employment:employee_id,current_position,work_schedule,team')
        ->paginate($perPage,['id','first_name','last_name','email','avatar','status','contact_number']);
    }
}
