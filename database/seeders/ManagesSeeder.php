<?php

namespace Database\Seeders;

use App\Talent\Manages\Models\Manages;
use Illuminate\Database\Seeder;

class ManagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Manages::factory()->count(2)->create();
    }
}
