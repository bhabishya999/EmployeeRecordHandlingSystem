<?php

namespace Database\Factories;

use App\Talent\EducationalDetails\Models\EducationalDetails;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EducationalDetails>
 */
class EducationalDetailsFactory extends Factory
{
    protected $model = EducationalDetails::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'education_level' =>$this->faker->randomElement(['SLC', '+2', 'Bachelors', 'Masters']),
            'passed_year' => $this->faker->date('Y', '2022'),
            'institution' => $this->faker->streetName()
        ];
    }
}
