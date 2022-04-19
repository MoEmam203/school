<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classrooms = [
            [
                'name' => [
                    'en' => 'classroom 1',
                    'ar' => 'الفصل الاول'
                ],
                'grade_id' => 1
            ],
            [
                'name' => [
                    'en' => 'classroom 2',
                    'ar' => 'الفصل الثاني'
                ],
                'grade_id' => 1
            ],
            [
                'name' => [
                    'en' => 'classroom 3',
                    'ar' => 'الفصل الثالث'
                ],
                'grade_id' => 1
            ],
            [
                'name' => [
                    'en' => 'classroom 4',
                    'ar' => 'الفصل الرابع'
                ],
                'grade_id' => 1
            ],
            [
                'name' => [
                    'en' => 'classroom 5',
                    'ar' => 'الفصل الخامس'
                ],
                'grade_id' => 1
            ],
            [
                'name' => [
                    'en' => 'classroom 6',
                    'ar' => 'الفصل السادس'
                ],
                'grade_id' => 1
            ],
            [
                'name' => [
                    'en' => 'classroom 1',
                    'ar' => 'الفصل الاول'
                ],
                'grade_id' => 2
            ],
            [
                'name' => [
                    'en' => 'classroom 2',
                    'ar' => 'الفصل الثاني'
                ],
                'grade_id' => 2
            ],
            [
                'name' => [
                    'en' => 'classroom 3',
                    'ar' => 'الفصل الثالث'
                ],
                'grade_id' => 2
            ],
            [
                'name' => [
                    'en' => 'classroom 1',
                    'ar' => 'الفصل الاول'
                ],
                'grade_id' => 3
            ],
            [
                'name' => [
                    'en' => 'classroom 2',
                    'ar' => 'الفصل الثاني'
                ],
                'grade_id' => 3
            ],
            [
                'name' => [
                    'en' => 'classroom 3',
                    'ar' => 'الفصل الثالث'
                ],
                'grade_id' => 3
            ],
        ];

        foreach($classrooms as $c){
            Classroom::create([
                'name' => $c['name'],
                'grade_id' => $c['grade_id']
            ]);
        }
    }
}
