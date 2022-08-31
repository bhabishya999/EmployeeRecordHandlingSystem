<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeListResource;
use App\Talent\Search\SearchManager;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct(private SearchManager $searchManager)
    {

    }

    public function index(Request $request)
    {
        $searchValue=$request->query('searchKey');
        $search=$this->searchManager->search($searchValue);
        return EmployeeListResource::collection($search);
    }
}
