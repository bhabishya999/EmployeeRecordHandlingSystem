<?php

namespace App\Talent\Manages\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manages extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'employee_id',
        'manages_id'
    ];
}
