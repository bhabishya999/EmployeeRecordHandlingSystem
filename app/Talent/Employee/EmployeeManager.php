<?php
namespace App\Talent\Employee;

use App\Models\Document;
use App\Models\Employee;

class EmployeeManager
{
    public function __construct(private Employee $employee, private Document $document)
    {

    }
    
    public function detailsStore(array $validated)
    {
        $employee= $this->employee->create($validated);
    }    
    public function documentStore(string $type,string $path,int $employee_id){
        $document=$this->document->create([
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
