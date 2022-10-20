<?php

namespace App\Http\Controllers;

use App\Http\Resources\LeaveListResource;
use App\Talent\Employee\Model\Employee;
use App\Talent\Leaves\Models\LeaveRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpFoundation\Response;


class LeaveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $leaveRequest=LeaveRequest::query()
        ->with(['employee' => function ($query) {
            $query->select('id','first_name','last_name','email','avatar');
        }])
        ->whereHas('employee', function ($query) use ($request) {
            $query->where('first_name', 'like', "%{$request->query('search')}%")
                ->orWhere('last_name', 'like', "%{$request->query('search')}%");
        })
        ->when(!empty($request->query('start_date') && $request->query('end_date')),function($query) use ($request){
                $query->where(function($query) use ($request) {
                    $query->where('leave_start_date', '>=', $request->query('start_date'))
                        ->where('leave_start_date', '<=', $request->query('end_date'));
                })
                ->orWhere(function($query) use ($request) {
                    $query->where('leave_end_date', '<=', $request->query('start_date'))
                        ->where('leave_end_date', '<=', $request->query('end_date'));
                });
            })
            ->get();
            return LeaveListResource::collection($leaveRequest);

    // SELECT * FROM leave_requests where ( leave_start_date >= $1 and leave_start_date <= $1) or ( leave_end_date <= $1 and leave_end_date <= $1)
    }

    public function store(Request $request)
    {
        $leaveRequest = new LeaveRequest();
        $employeeId=Employee::where('email',$request->input('Email'))->first();
        $leaveRequest->setAttribute('employee_id',$employeeId->id);
        $leaveRequest->setAttribute('form_id', $request->input('Form Id'));
        $leaveRequest->setAttribute('leave_type', $request->input('What leave do you want to apply for?'));
        $leaveRequest->setAttribute('leave_reason', $request->input('Reason for leave'));
        $leaveRequest->setAttribute('leave_start_date', new Carbon($request->input('Leave Start Date')));
        $leaveRequest->setAttribute('leave_end_date', new Carbon($request->input('Leave End Date')));
        $leaveRequest->setAttribute('leave_approved', $request->input('Approved by Team Leader'));
        $leaveRequest->setAttribute('douments', $request->input('Supporting Documents'));

        

        throw_if(!$leaveRequest->save(), new BadRequestException());


        return new JsonResponse([], Response::HTTP_NO_CONTENT);
    }
    
}
