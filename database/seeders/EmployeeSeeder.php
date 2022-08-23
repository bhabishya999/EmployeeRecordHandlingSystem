<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'user_id' => 2,
            'first_name' => 'Zoey',
            'last_name' => 'Haley',
            'email' =>'nya.crist@example.org' ,
            'contact_number' => '9841111111',
            'date_of_birth' =>'2054-02-01',
            'current_address' =>'naikap',
            'pan_number' => '1212121212',
            'bank_account_number' =>'1312456574',
            'avatar' =>'employeeimages/yVs34WuQI23LeQSbzVo9L3ppeyVjPj5j7UPXyJC9.png'

        ]);
    }
}
