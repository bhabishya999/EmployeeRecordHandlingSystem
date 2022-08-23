<?php

namespace App\Talent\KeyEmploymentDetails\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KeyEmploymentDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'organization',
        'join_date',
        'current_position',
        'work_schedule',
        'team',
        'manager',
        'manages',
        'superpowers',
    ];

    public function manages(): HasMany
    {
        return $this->hasMany(Manages::class);
    }
}
