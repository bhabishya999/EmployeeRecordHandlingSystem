<?php

namespace App\Http\Controllers;
use App\Http\Requests\EmployeeRequest;
use App\Talent\Employee\EmployeeManager;
use Illuminate\Http\Response;
use App\Models\Employee;
use App\Models\User;
use App\Talent\User\UserManager;
use Carbon\Carbon;
use Illuminate\Support\Str;


class EmployeeController extends Controller
{
    public function __construct(private EmployeeManager $employeeManager,private UserManager $userManager)
    {

    }
    public function personaldetail(EmployeeRequest $request){
        $validated = $request->validated();
        $validated['date_of_birth'] = Carbon::parse($validated['date_of_birth'])->format('Y-m-d');  

        $request->hasFile('avatar');
        $validated['avatar']=$request->avatar->store('images','public');
        $employeeManager=$this->employeeManager->detailsStore($validated);
        $employee_id=$this->employeeManager->findbyEmail($validated['email']);
        if($request->hasFile('documents'))
        {
            foreach($request->documents as $d){
            $path=$d->store('files','public');
            $type=$d->getClientMimeType();
            $employeeManager=$this->employeeManager->documentStore(
                $type,
                $path,
                $employee_id,
            );
            }
        }
        $user=$this->userManager->store($validated['first_name'],$validated['email'],$employee_id);
        $employee_details=Employee::with('documents')->find($employee_id);
        $user_details=User::where('employee_id',$employee_id)->firstOrFail();
        
        return response([
            'user_details'=>$user_details,
            'employee_details'=>$employee_details,
            'message'=>'Personal detail added successfully',
        ],Response::HTTP_OK);
    }
}
