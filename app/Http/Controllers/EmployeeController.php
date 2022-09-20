<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeListResource;
use App\Http\Resources\EmployeeProfileResource;
use App\Models\User;
use App\Talent\Employee\Requests\EmployeeCreateRequest;
use App\Talent\Employee\EmployeeManager;
use Illuminate\Http\Response;
use App\Talent\User\UserManager;
use App\Talent\Documents\DocumentManager;
use App\Talent\Documents\Model\Document;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Talent\Employee\Model\Employee;
use App\Talent\Employee\Requests\EmployeeEditRequest;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function __construct(private Document $document, private EmployeeManager $employeeManager, private Employee $employee, private UserManager $userManager, private DocumentManager $documentManager, private User $user)
    {
    }

    public function store(EmployeeCreateRequest $request)
    {
        $validated = $request->validated();
        $userArray = [
            'name' => $validated['first_name'] . " " . $validated['last_name'],
            'email' => $validated['email'],
            'password' => Hash::make("Introcept@123"),
            'role' => 'user'
        ];
        $userCreate = $this->userManager->store($userArray);
        return $this->employeeStore($validated, $userCreate);
    }

    public function employeeStore($validated, $userCreate)
    {
        if (empty($validated['avatar'])) {
            $validated['avatar'] = null;
        } else {
            $validated['avatar'] = $validated['avatar']->store('employeeimages', 'public');
        }
        $userId = $userCreate->id;
        $userIdArray = [
            'user_id' => $userId,
            'status' => 'Active',
        ];
        $employeeArray = array_merge($validated, $userIdArray);
        $employeeCreate = $this->employeeManager->store($employeeArray);
        $employeeId = $employeeCreate->id;

        foreach ($validated['documents'] as $document) {
            $name = $document->getClientOriginalName();
            $type = $document->getClientMimeType();
            $path = $document->store('employeedocuments', 'public');
            $documentArray = [
                'employee_id' => $employeeId,
                'original_name' => $name,
                'type' => $type,
                'path' => $path,
            ];
            $documentCreate = $this->documentManager->store($documentArray);
        }

        return response([
            'userId' => $userId,
            'employeeId' => $employeeId,
            'message' => 'Personal detail added successfully',
        ], Response::HTTP_OK);
    }

    public function index(Request $request)
    {
        $search = $request->query('search');
        $perpage = $request->query('perPage');
        $filter = $request->query('filter');
        $employeeList = $this->employeeManager->employeeList($perpage, $search, $filter);
        return EmployeeListResource::collection($employeeList);
    }

    public function show($employeeId)
    {
        $employeeDetails = $this->employeeManager->employeeProfile($employeeId);

        return new EmployeeProfileResource($employeeDetails);
    }

    public function userUpdate(EmployeeEditRequest $request, int $employeeId)
    {
        try {
            $this->employee->findOrFail($employeeId);
        } catch (\Throwable) {
            return responseHelper('Sorry,could not found this user', Response::HTTP_NOT_FOUND, 'Failed');
        }
        $validated = $request->validated();
        DB::transaction(function () use ($validated, $employeeId) {
            $userArray = [
                'name' => $validated['first_name'] . " " . $validated['last_name'],
                'email' => $validated['email'],
            ];
            $this->user->where('id', $employeeId)->update($userArray);
            $this->employeeUpdate($validated, $employeeId);
        });
        return responseHelper('Personal Details updated successfully');
    }

    public function employeeUpdate($validated, $userId)
    {
        DB::transaction(function () use ($validated, $userId) {
            if (empty($validated['avatar'])) {
                $validated['avatar'] = null;
            } else {
                $validated['avatar'] = $validated['avatar']->store('employeeimages', 'public');
            }
            $employeeArray = [
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'contact_number' => $validated['contact_number'],
                'date_of_birth' => $validated['date_of_birth'],
                'current_address' => $validated['current_address'],
                'pan_number' => $validated['pan_number'],
                'bank_account_number' => $validated['bank_account_number'],
                'avatar' => $validated['avatar'],
            ];
            $employeeUpdate = $this->employee->where('id', $userId)->update($employeeArray);
            $this->documentUpdate($validated, $userId);
        });
    }

    public function documentUpdate($validated, $userId)
    {
        DB::transaction(function () use ($validated, $userId) {
            if (!empty($validated['documents'])) {
                foreach ($validated['documents'] as $document) {
                    $name = $document->getClientOriginalName();
                    $type = $document->getClientMimeType();
                    $path = $document->store('employeedocuments', 'public');
                    $documentArray = [
                        'employee_id' => $userId,
                        'original_name' => $name,
                        'type' => $type,
                        'path' => $path,
                    ];
                    $documentCreate = $this->document->create($documentArray);
                }
            } else{
                $documentIds = collect($validated['document_id']);
                Document::query()->whereIn('id', $documentIds)->delete();
            }
        });
    }
}
