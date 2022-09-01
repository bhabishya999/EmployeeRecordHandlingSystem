<?php

namespace Database\Seeders;

use App\Talent\Manages\Models\Manages;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Talent\Documents\Model\Document;
use App\Talent\EducationalDetails\Models\EducationalDetails;
use App\Talent\Employee\Model\Employee;
use App\Talent\KeyEmploymentDetails\Models\KeyEmploymentDetails;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $employee = Employee::all();

        User::factory(20)
            ->has(
                Employee::factory()

                    ->count(1)
                    ->state(function (array $attributes, User $user) {
                        return ['user_id' => $user->id,
                            'email' => $user->email];
                    })

                    ->has(
                        Document::factory()
                        ->count(2)
                            ->state(function (array $attributes, Employee $employee){
                                return ['employee_id' => $employee->id];
                    })
                    )
                    ->has(
                        EducationalDetails::factory()
                        ->count(2)
                        ->state(function (array $attributes, Employee $employee){
                            return ['employee_id' => $employee->id];
                        })
                    )
                ->has(
                    KeyEmploymentDetails::factory()
                    ->count(1)
                    ->state(function (array $attributes, Employee $employee){
                        return ['employee_id' => $employee->id,
                            'manager'=> $employee->id];
                    })

                )

            )
            ->create();

    }

}
