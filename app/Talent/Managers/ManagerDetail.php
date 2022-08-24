<?php
namespace App\Talent\Managers;
use App\Talent\Employee\Model\Employee;
use Illuminate\Database\Eloquent\Collection;

class ManagerDetail
{
    public function __construct(private Employee $employee)
    {

    }

    public function managerList($id):Collection
    {
        $managerList=$this->employee->where('id','!=',$id)->get(['id','first_name','last_name','avatar']);
        return $managerList;
    }
}
