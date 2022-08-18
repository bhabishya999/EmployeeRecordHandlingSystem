<?php

namespace App\Talent\Documents\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'original_name',
        'type',
        'path',
    ];
}
