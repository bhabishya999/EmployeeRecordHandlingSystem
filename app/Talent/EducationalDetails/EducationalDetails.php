<?php


namespace App\Talent\EducationalDetails\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'education_level',
        'passed_year',
        'institution'
    ];  
}
