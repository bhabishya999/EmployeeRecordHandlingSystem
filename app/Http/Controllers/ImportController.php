<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Talent\ImportData\Requests\ImportDataRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Rap2hpoutre\FastExcel\FastExcel;
use Throwable;

class ImportController extends Controller
{
    public function __construct(private User $user)
    {

    }

    public function import(ImportDataRequest $request)
    {
        $validated = $request->validated();
        $collection = (new FastExcel)->import($validated['file'], function ($rows) {
                $validator = Validator::make($rows, [
                    'First Name' => 'required',
                    'Last Name' => 'required',
                    'Email' => 'required|unique:users,email',
                    'Role' => 'required',
                    'Status' => 'required',
                    'Contact Number' => 'required',
                    'Date of Birth' => 'required',
                    'Current Address' => 'required',
                    'Education Level' => 'required',
                    'Passed Year' => 'required',
                    'Institution' => 'required',
                    'Organization' => 'required',
                    'Join Date' => 'required',
                    'Current Position' => 'required',
                    'Work Schedule' => 'required',
                    'Team' => 'required',
                    'Manager' => 'required',
                    'Superpower' => 'required',
                    'Manages' => 'required',
                ]);

                if($validator->fails()){
                return responseHelper('Data validation failed. Please fix the errors and upload the file again',Response::HTTP_BAD_REQUEST,'Failed');
                 }
                 else{
                $user = $this->user->create([
                    'name' => $rows['First Name'] . " " . $rows['Last Name'],
                    'email' => $rows['Email'],
                    'password' => Hash::make('Introcept@123'),
                    'role' => $rows['Role']
                ]);
                $employee = $user->employees()->create([
                    'status' => $rows['Status'],
                    'first_name' => $rows['First Name'],
                    'last_name' => $rows['Last Name'],
                    'email' => $rows['Email'],
                    'contact_number' => $rows['Contact Number'],
                    'date_of_birth' => $rows['Date of Birth'],
                    'current_address' => $rows['Current Address'],
                    'pan_number' => $rows['Pan Number'],
                    'bank_account_number' => $rows['Bank Account Number'],
                ]);
                $education = $employee->education()->create([
                    'education_level' => $rows['Education Level'],
                    'passed_year' => $rows['Passed Year'],
                    'institution' => $rows['Institution'],
                ]);
                $employment = $employee->employment()->create([
                    'organization' => $rows['Organization'],
                    'join_date' => $rows['Join Date'],
                    'current_position' => $rows['Current Position'],
                    'work_schedule' => $rows['Work Schedule'],
                    'team' => $rows['Team'],
                    'manager' => $rows['Manager'],
                    'superpowers' => $rows['Superpower'],
                ]);
                $employment->manages()->create([
                    'employee_id' => $rows['Manages'],
                ]);
            }
            return responseHelper('File imported successfully');
        });
    }
}
