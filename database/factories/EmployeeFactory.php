<?php

namespace Database\Factories;

use App\Talent\Employee\Model\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => rand(0,1),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'contact_number' => $this->faker->phoneNumber(),
            'date_of_birth' => $this->faker->date(),
            'current_address' => $this->faker->address(),
            'pan_number' => $this->faker->numerify('##########'),
            'bank_account_number'=> $this->faker->numerify('##########'),
            'avatar' => 'employeeimages/yVs34WuQI23LeQSbzVo9L3ppeyVjPj5j7UPXyJC9.png',
        ];
    }
}
