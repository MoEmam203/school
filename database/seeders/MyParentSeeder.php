<?php

namespace Database\Seeders;

use App\Models\MyParent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MyParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parents = [
            [
                'email' => 'eslam@test.com',
                'password' => Hash::make('12345678'),
                'father_name' => [
                    'en' => 'Eslam',
                    'ar' => 'اسلام'
                ],
                'father_national_id' => '18003201501324',
                'father_passport_id' => '18003201501324',
                'father_phone' => '01234567895',
                'father_job' => [
                    'en' => 'Programmer',
                    'ar' => 'مبرمج'
                ],
                'father_address' => 'Cairo',

                'mother_name' => [
                    'en' => 'Sara',
                    'ar' => 'سارة'
                ],
                'mother_national_id' => '18005001501324',
                'mother_passport_id' => '18005001501324',
                'mother_phone' => '01234567894',
                'mother_job' => [
                    'en' => 'Teacher',
                    'ar' => 'مدرسة'
                ],
                'mother_address' => 'Cairo',

                'father_nationality_id' => 64,
                'father_blood_type_id' => rand(1,8),
                'father_religion_id' => 1,

                'mother_nationality_id' => 64,
                'mother_blood_type_id' => rand(1,8),
                'mother_religion_id' => 1,
            ],
            [
                'email' => 'ahmed@test.com',
                'password' => Hash::make('12345678'),
                'father_name' => [
                    'en' => 'Ahmed',
                    'ar' => 'احمد'
                ],
                'father_national_id' => '18003225501324',
                'father_passport_id' => '18003225501324',
                'father_phone' => '01234567859',
                'father_job' => [
                    'en' => 'Programmer',
                    'ar' => 'مبرمج'
                ],
                'father_address' => 'Mansoura',

                'mother_name' => [
                    'en' => 'Maha',
                    'ar' => 'مها'
                ],
                'mother_national_id' => '18005441501324',
                'mother_passport_id' => '18005441501324',
                'mother_phone' => '01233567894',
                'mother_job' => [
                    'en' => 'Teacher',
                    'ar' => 'مدرسة'
                ],
                'mother_address' => 'Mansoura',

                'father_nationality_id' => 64,
                'father_blood_type_id' => rand(1,8),
                'father_religion_id' => 1,

                'mother_nationality_id' => 64,
                'mother_blood_type_id' => rand(1,8),
                'mother_religion_id' => 1,
            ],
            [
                'email' => 'omar@test.com',
                'password' => Hash::make('12345678'),
                'father_name' => [
                    'en' => 'Omar',
                    'ar' => 'عمر'
                ],
                'father_national_id' => '18003455501324',
                'father_passport_id' => '18003455501324',
                'father_phone' => '01234747859',
                'father_job' => [
                    'en' => 'Engineer',
                    'ar' => 'مهندس'
                ],
                'father_address' => 'Alexandria',

                'mother_name' => [
                    'en' => 'Nada',
                    'ar' => 'ندي'
                ],
                'mother_national_id' => '18005432501324',
                'mother_passport_id' => '18005432501324',
                'mother_phone' => '02543567894',
                'mother_job' => [
                    'en' => 'Teacher',
                    'ar' => 'مدرسة'
                ],
                'mother_address' => 'Alexandria',

                'father_nationality_id' => 64,
                'father_blood_type_id' => rand(1,8),
                'father_religion_id' => 1,

                'mother_nationality_id' => 64,
                'mother_blood_type_id' => rand(1,8),
                'mother_religion_id' => 1,
            ],
        ];

        foreach($parents as $p){
            MyParent::create([
                'email' => $p['email'],
                'password' => $p['password'],

                'father_name' => $p['father_name'],
                'father_national_id' => $p['father_national_id'],
                'father_passport_id' => $p['father_passport_id'],
                'father_phone' => $p['father_phone'],
                'father_job' => $p['father_job'],
                'father_address' => $p['father_address'],
                'father_nationality_id' => $p['father_nationality_id'],
                'father_blood_type_id' => $p['father_blood_type_id'],
                'father_religion_id' => $p['father_religion_id'],

                'mother_name' => $p['mother_name'],
                'mother_national_id' => $p['mother_national_id'],
                'mother_passport_id' => $p['mother_passport_id'],
                'mother_phone' => $p['mother_phone'],
                'mother_job' => $p['mother_job'],
                'mother_address' => $p['mother_address'],
                'mother_nationality_id' => $p['mother_nationality_id'],
                'mother_blood_type_id' => $p['mother_blood_type_id'],
                'mother_religion_id' => $p['mother_religion_id'],
            ]);
        }
    }
}
