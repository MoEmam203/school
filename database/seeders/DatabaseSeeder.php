<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(BloodTypesSeeder::class);
        $this->call(ReligionsSeeder::class);
        $this->call(NationalitiesSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(SpecializationSeeder::class);
    }
}
