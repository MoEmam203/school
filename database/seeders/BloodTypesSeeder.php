<?php

namespace Database\Seeders;

use App\Models\Blood_Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blood__types')->delete();

        $bloodTypes = [
            'O-', 'O+', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-'
        ];

        foreach($bloodTypes as $type){
            Blood_Type::create(['name' => $type]);
        }
    }
}
