<?php
namespace App\Talent\Managers;
use App\Talent\Employee\Model\Employee;
use Illuminate\Database\Eloquent\Collection;

class ManagerDetail
{
    public function __construct(private Employee $employee)
    {

    }
    public function managerList(array $excludingIds):Collection
    {
        return $this->employee->whereNotIn('id', $excludingIds)->get();
    }
}
