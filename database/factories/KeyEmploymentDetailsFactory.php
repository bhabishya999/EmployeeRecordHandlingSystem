<?php

namespace Database\Factories;

use App\Models\User;
use App\Talent\Employee\Model\Employee;
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
            'organization'=> $this->faker->randomElement(['IntroceptNepal', 'IntroceptAustralia']),
            'join_date' => $this->faker->date(),
            'current_position' => $this->faker->randomElement(['Intern', 'Software Engineering', 'QA', 'Product Management']),
            'work_schedule' => $this->faker->randomElement(['mon-fri(full-time)', 'mon-fri(part-time)']),
            'team' => $this->faker->randomElement([ 'Software Engineering', 'QA', 'Product Management']),
            'superpowers' => $this->faker->randomElement([ 'Hard Working', 'Good Communication', 'Responsible', 'Professional'])
        ];
    }
}
