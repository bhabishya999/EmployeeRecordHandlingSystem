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

    public function createManages(array $managerId)
    {
        $managers = $this->manages->create($managerId);
        return $managers;
    }
}
