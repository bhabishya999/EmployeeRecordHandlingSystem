<?php

namespace App\Http\Controllers;
use App\Talent\Managers\ManagerDetail;
use Illuminate\Http\Response;

class ManagerListController extends Controller
{
    public function __construct(private ManagerDetail $managerDetail)
    {

    }
    public function index($id):Response
    {
        $managerList=$this->managerDetail->managerList($id);
        return response([
            "managerList"=>$managerList
        ], Response::HTTP_OK);
    }
}
