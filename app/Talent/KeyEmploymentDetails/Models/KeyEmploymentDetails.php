<?php

namespace App\Talent\KeyEmploymentDetails\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyEmploymentDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'organization',
        'join_date',
        'current_position',
        'current_position',
        'work_schedule',
        'team',
        'manager',
        'superpowers',
    ];
}
