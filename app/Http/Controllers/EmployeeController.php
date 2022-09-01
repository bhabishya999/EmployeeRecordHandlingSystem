<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeListResource;
use App\Http\Resources\EmployeeProfileResource;
use App\Talent\Employee\Requests\EmployeeCreateRequest;
use App\Talent\Employee\EmployeeManager;
use Illuminate\Http\Response;
use App\Talent\User\UserManager;
use App\Talent\Documents\DocumentManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Talent\Employee\Model\Employee;


class EmployeeController extends Controller
{
    public function __construct(private EmployeeManager $employeeManager,private Employee $employee,private UserManager $userManager,private DocumentManager $documentManager)
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
        if(empty($validated['avatar'])){
            $validated['avatar']=null;
        }
        else{
            $validated['avatar']=$validated['avatar']->store('employeeimages','public');
        }
        $userId=$userCreate->id;
        $userIdArray=[
             'user_id'=>$userId,
             'status'=>'Active',
            ];
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

    public function index(Request $request)
    {
        $search=$request->query('search');
        $perpage=$request->query('perPage');
        $filter=$request->query('filter');
        $employeeList=$this->employeeManager->employeeList($perpage,$search,$filter);
        return EmployeeListResource::collection($employeeList);
    }

    public function showDetails(Request $request)
    {
        $id = $request->query('id');
        $employeeDetails = $this->employeeManager->employeeProfile($id);
        if(!$employeeDetails){
            return responseHelper('Details Not Found!', Response::HTTP_NOT_FOUND, 'Failed!');

        }
        return new EmployeeProfileResource($employeeDetails);
    }
}
