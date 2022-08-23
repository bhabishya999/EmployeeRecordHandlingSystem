<?php

namespace App\Talent\KeyEmploymentDetails\Models;

use Illuminate\Database\Eloquent\Model;

class Manages extends Model
{
    protected $table = "manages";

    protected $fillable =
        [
            'employee_id',
            'key_employee_details_id'
        ];
}
