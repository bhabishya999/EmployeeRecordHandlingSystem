<?php
namespace App\Talent\Search;

use App\Talent\Employee\Model\Employee;
use  Illuminate\Database\Eloquent\Collection;

class SearchManager
{
    public function __construct(private Employee $employee)
    {

    }
    public function search(string $searchValue): Collection|array
    {
        return $this->employee->with('employment:employee_id,current_position,work_schedule,team')
        ->where('first_name','LIKE','%'.$searchValue.'%')->orWhere('last_name','LIKE','%'.$searchValue.'%')
        ->orWhere('email','LIKE','%'.$searchValue.'%')->get(['id','first_name','last_name','email','status','avatar','contact_number']);
    }
}
