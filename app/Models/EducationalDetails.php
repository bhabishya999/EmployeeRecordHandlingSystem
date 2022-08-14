<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'user_id',
        'education_level',
        'passed_year',
        'institution'
    ];  
}
