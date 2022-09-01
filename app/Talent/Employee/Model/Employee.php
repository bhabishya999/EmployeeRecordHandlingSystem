<?php

namespace App\Talent\Employee\Model;

use App\Talent\Documents\Model\Document;
use App\Talent\EducationalDetails\Models\EducationalDetails;
use App\Talent\KeyEmploymentDetails\Models\KeyEmploymentDetails;
use App\Talent\Manages\Models\Manages;
use Database\Factories\EmployeeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        'status',
        'user_id',
    ];

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function educationalDetail():HasMany
    {
        return $this ->hasMany(EducationalDetails::class);
    }

    public function keyEmploymentDetail():HasOne
    {
        return $this ->hasOne(KeyEmploymentDetails::class);
    }

    public function manages(): HasMany
    {
        return $this -> hasMany(Manages::class);
    }

    protected static  function newFactory(): EmployeeFactory
    {
        return EmployeeFactory::new();
    }
}
