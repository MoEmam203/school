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
        $this->call([
            UserSeeder::class,
            BloodTypesSeeder::class,
            ReligionsSeeder::class,
            NationalitiesSeeder::class,
            GenderSeeder::class,
            SpecializationSeeder::class,
            GradeSeeder::class,
            ClassroomSeeder::class,
            SectionSeeder::class,
            MyParentSeeder::class,
            TeacherSeeder::class
        ]);
    }
}
