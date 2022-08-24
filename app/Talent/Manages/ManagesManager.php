<?php
namespace App\Talent\Manages;
use App\Talent\Manages\Models\Manages;
use Illuminate\Http\Response;
use Throwable;

class ManagesManager
{
    public function __construct(private Manages $manages)
    {
        
    }

    public function createManagers(array $managerId)
    {
        try
        {    
        $managers = $this->manages->updateOrCreate($managerId);
        return $managers;

        }catch(Throwable)
        {

            return responseHelper('Something Went Wrong, Please Try Again Later', Response::HTTP_NOT_FOUND, 'Failed!' );
        }

    }
}