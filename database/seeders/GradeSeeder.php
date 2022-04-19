<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grades = [
            [
                'en' => 'Primary Grade',
                'ar' => 'المرحلة الابتدائية'
            ],
            [
                'en' => 'Mid Level Grade',
                'ar' => 'المرحلة الاعدادية'
            ],
            [
                'en' => 'High school Grade',
                'ar' => 'المرحلة الثانوية'
            ],
        ];

        foreach($grades as $grade){
            Grade::create(['name' => $grade]);
        }
    }
}
