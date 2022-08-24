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

    public function createManager(array $managerId)
    {  
        $managers = $this->manages->updateOrCreate($managerId);
        return $managers;
    }
}