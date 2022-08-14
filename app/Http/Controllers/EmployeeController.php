<?php

namespace App\Http\Controllers;
use App\Http\Requests\EmployeeRequest;
use App\Talent\Employee\EmployeeManager;
use Illuminate\Http\Response;
use App\Models\Employee;
use App\Models\User;
use App\Talent\User\UserManager;

class EmployeeController extends Controller
{
    public function __construct(private EmployeeManager $employeeManager,private UserManager $userManager)
    {

    }
    public function personaldetail(EmployeeRequest $request){
        $validated = $request->validated();
        $validateddate = strtotime($validated['date_of_birth']);
        $date = date("Y-m-d", $validateddate);

        if($request->hasFile('avatar'))
        {
        $name=$request->avatar->getClientOriginalName();
        $storage=$request->avatar->storeAs('images',$name,'public');
        $employeeManager=$this->employeeManager->details_store(
        $validated['first_name'],
        $validated['last_name'],
        $validated['email'],
        $validated['country_code'],
        $validated['contact_number'],
        $date,
        $validated['current_address'],
        $validated['pan_number'],
        $validated['bank_account_number'],
        $name
    );
}
        $employee_id=$this->employeeManager->findbyEmail($validated['email']);
        if($request->hasFile('documents'))
        {
            foreach($request->documents as $d){
            $name=$d->getClientOriginalName();
            $storage=$d->storeAs('files',$name,'public');
            $type=$d->getClientMimeType();
            $path=$d->getPathname();
            $employeeManager=$this->employeeManager->document_store(
                $name,
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
