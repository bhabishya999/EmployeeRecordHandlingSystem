<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeResource;
use App\Talent\Managers\ManagerDetail;
use Illuminate\Http\Request;

class ManagerListController extends Controller
{
    public function __construct(private ManagerDetail $managerDetail)
    {

    }
    public function index(Request $request)
    {
        $excludingIds = $request->query('exclude_ids');
        $excludingIdsArray=[$excludingIds];
        $managers=$this->managerDetail->managerList($excludingIdsArray);
        return EmployeeResource::collection($managers);
    }
}
