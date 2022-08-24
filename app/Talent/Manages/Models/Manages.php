<?php

namespace App\Talent\Manages\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Manages extends Model
{
    use HasFactory;
    protected $table = "manages";

    public $timestamps = false;

    protected $fillable =
        [
            'employee_id',
            'key_employment_detail_id'
        ];
}
