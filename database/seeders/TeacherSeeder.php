<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teachers = [
            [
                'email' => 'mohammed@test.com',
                'password' => Hash::make('12345678'),
                'name' => [
                    'en' => 'Mohammed',
                    'ar' => 'محمد'
                ],
                'joining_date' => '2022-03-01',
                'address' => 'Cairo',
                'specialization_id' => rand(1,4),
                'gender_id' => 1
            ],
            [
                'email' => 'sara@test.com',
                'password' => Hash::make('12345678'),
                'name' => [
                    'en' => 'Sara',
                    'ar' => 'سارة'
                ],
                'joining_date' => '2022-02-01',
                'address' => 'Alexandria',
                'specialization_id' => rand(1,4),
                'gender_id' => 2
            ],
            [
                'email' => 'rewan@test.com',
                'password' => Hash::make('12345678'),
                'name' => [
                    'en' => 'Rewan',
                    'ar' => 'روان'
                ],
                'joining_date' => '2022-01-01',
                'address' => 'Mansoura',
                'specialization_id' => rand(1,4),
                'gender_id' => 2
            ],
            [
                'email' => 'karim@test.com',
                'password' => Hash::make('12345678'),
                'name' => [
                    'en' => 'Karim',
                    'ar' => 'كريم'
                ],
                'joining_date' => '2022-01-15',
                'address' => 'Mansoura',
                'specialization_id' => rand(1,4),
                'gender_id' => 1
            ],
        ];

        foreach($teachers as $t){
            Teacher::create([
                'email' => $t['email'],
                'password' => $t['password'],
                'name' => $t['name'],
                'joining_date' => $t['joining_date'],
                'address' => $t['address'],
                'specialization_id' => $t['specialization_id'],
                'gender_id' => $t['gender_id']
            ]);
        }
    }
}
