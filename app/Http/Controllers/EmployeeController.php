<?php

namespace App\Http\Controllers;
use App\Talent\Employee\Requests\EmployeeCreateRequest;
use App\Talent\Employee\EmployeeManager;
use Illuminate\Http\Response;
use App\Talent\User\UserManager;
use App\Talent\Documents\DocumentManager;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;



class EmployeeController extends Controller
{
    public function __construct(private EmployeeManager $employeeManager,private UserManager $userManager,private DocumentManager $documentManager)
    {

    }
    public function store(EmployeeCreateRequest $request){
        $validated = $request->validated();
        $userArray=[
            'name'=>$validated['first_name']." ".$validated['last_name'],
            'email'=>$validated['email'],
            'password'=>Hash::make("Introcept@123"),
            'role'=>'user'
         ];
             $userCreate=$this->userManager->store($userArray);
             return $this->employeeStore($validated,$userCreate);
    }
    public function employeeStore($validated,$userCreate){
        $validated['date_of_birth'] = Carbon::parse($validated['date_of_birth'])->format('Y-m-d');  
        $validated['avatar']=$validated['avatar']->store('employeeimages','public');
        $userId=$userCreate->id;
        $userIdArray=["user_id"=>$userId];
        $employeeArray=array_merge($validated,$userIdArray);
        $employeeCreate=$this->employeeManager->store($employeeArray);
        $employeeId=$employeeCreate->id;

            foreach($validated['documents'] as $document){
            $name=$document->getClientOriginalName();
            $type=$document->getClientMimeType();
            $path=$document->store('employeedocuments','public');
            $documentArray=[
                'employee_id'=>$employeeId,
                'original_name'=>$name,
                'type'=>$type,
                'path'=>$path,
            ];
            $documentCreate=$this->documentManager->store($documentArray);
            }
       
        return response([
            'userId'=>$userId,
            'employeeId'=>$employeeId,
            'message'=>'Personal detail added successfully',
        ],Response::HTTP_OK);
    }
}
