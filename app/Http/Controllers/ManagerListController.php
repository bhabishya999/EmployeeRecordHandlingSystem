<?php

namespace App\Http\Controllers;

use App\Talent\Employee\EmployeeManager;
use Illuminate\Http\Response;

class ManagerListController extends Controller
{
    public function __construct(private EmployeeManager $employeeManager)
    {

    }
    public function index(): Response
    {
        $managerList=$this->employeeManager->employeeList();
        return response([
            "managerList"=>$managerList
        ], Response::HTTP_OK);
    }
}
