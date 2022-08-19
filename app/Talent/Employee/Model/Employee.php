<?php

namespace App\Talent\Employee\Model;
use App\Talent\Documents\Model\Document;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'contact_number',
        'date_of_birth',
        'current_address',
        'pan_number',
        'bank_account_number',
        'avatar',
        'user_id',
    ];
    
    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function educationalDetails()
    {
        return $this->hasMany(EducationalDetails::class);
    }
}
