<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PasswordReset;
use Illuminate\Support\Str;
class PasswordResetFactory extends Factory
{
    protected $model = PasswordReset::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email'=>'sushant.paneru@introcept.co',
            'token' => Str::random(20),
            'created_at' => now()
        ];
    }
}
