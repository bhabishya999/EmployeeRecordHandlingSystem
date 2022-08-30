<?php

namespace Database\Factories;

use App\Talent\KeyEmploymentDetails\Models\KeyEmploymentDetails;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KeyEmploymentDetails>
 */
class KeyEmploymentDetailsFactory extends Factory
{
    protected $model = KeyEmploymentDetails::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'organization'=> 'IntroceptNepal',
            'join_date' => $this->faker->date(),
            'current_position' => 'Intern',
            'work_schedule' => 'mon-fri(full-time)',
            'team' => 'QA',
            'manager' => rand(1,20),
            'superpowers' => $this->faker->word()
        ];
    }
}
