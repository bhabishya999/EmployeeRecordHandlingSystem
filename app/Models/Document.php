<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'name',
        'type',
        'path',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
