<?php

namespace App\Http\Controllers;
use App\Http\Requests\EmployeeRequest;
use App\Talent\Employee\EmployeeManager;
use Illuminate\Http\Response;
use App\Models\Employee;
use App\Models\User;
use App\Talent\User\UserManager;
use App\Talent\Documents\DocumentManager;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;



class EmployeeController extends Controller
{
    public function __construct(private EmployeeManager $employeeManager,private UserManager $userManager,private DocumentManager $documentManager)
    {

    }
    public function personaldetail(EmployeeRequest $request){
        $validated = $request->validated();
        $validated['date_of_birth'] = Carbon::parse($validated['date_of_birth'])->format('Y-m-d');  
        $validated['avatar']=$request->avatar->store('images','public');

       $userArray=[
       'name'=>$validated['first_name']." ".$validated['last_name'],
       'email'=>$validated['email'],
       'password'=>Hash::make("Introcept@123"),
       'role'=>'user'
    ];
        $user=$this->userManager->store($userArray);

        $user_id=$this->userManager->fetchID($validated['email']);
        $userIdArray=["user_id"=>$user_id];
        $employeeArray=array_merge($validated,$userIdArray);
        $employeeManager=$this->employeeManager->create($employeeArray);

        $employee_id=$this->employeeManager->findbyEmail($validated['email']);

            foreach($request->documents as $d){
            $name=$d->getClientOriginalName();
            $type=$d->getClientMimeType();
            $path=$d->storeAs('files',$name,'public');
            $documentArray=[
                'employee_id'=>$employee_id,
                'name'=>$name,
                'type'=>$type,
                'path'=>$path,
            ];
            $employeeManager=$this->documentManager->create($documentArray);
            }
       
        return response([
            'user_id'=>$user_id,
            'employee_id'=>$employee_id,
            'message'=>'Personal detail added successfully',
        ],Response::HTTP_OK);
    }
}
