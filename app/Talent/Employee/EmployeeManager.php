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
    public function employeeList(?int $perPage=10, ?string $search=null, ?string $filter=null):LengthAwarePaginator
    {
        return $this->employee->with('keyEmploymentDetail:employee_id,current_position,work_schedule,team')
        ->when(!empty($search),function($query) use ($search)
        {
        $query->where('first_name','LIKE','%'.$search.'%')->orWhere('last_name','LIKE','%'.$search.'%')
        ->orWhere('email','LIKE','%'.$search.'%');
        })
        ->when(!empty($filter),function($query) use ($filter)
        {
        $query->where('status',$filter)->orWhereRelation('keyEmploymentDetail','team',$filter);
        })
        ->select(['id','first_name','last_name','email','status','avatar','contact_number'])
        ->paginate($perPage);
     }

    public function employeeProfile($employee_id)
    {
        return $this->employee->with('documents')->findOrFail($employee_id);
    }
}
