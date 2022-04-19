<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = [
            [
                'en' => 'A',
                'ar' => 'ا'
            ],
            [
                'en' => 'B',
                'ar' => 'ب'
            ],
            [
                'en' => 'C',
                'ar' => 'ج'
            ],
        ];

        $classrooms = Classroom::all();
        foreach($classrooms as $c){
            foreach($sections as $s){
                $c->sections()->create([
                    'name' => $s,
                    'grade_id' => $c->grade->id
                ]);
            }
        }

    }
}
