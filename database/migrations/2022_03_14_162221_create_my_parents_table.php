<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_parents', function (Blueprint $table) {
            $table->id();
            
            $table->string('email')->unique();
            $table->string('password');

            //Father information
            $table->string('father_name');
            $table->string('father_national_id');
            $table->string('father_passport_id');
            $table->string('father_phone');
            $table->string('father_job');
            $table->string('father_address');

            //Mother information
            $table->string('mother_name');
            $table->string('mother_national_id');
            $table->string('mother_passport_id');
            $table->string('mother_phone');
            $table->string('mother_job');
            $table->string('mother_address');

            $table->timestamps();

            $table->foreignId('father_nationality_id')->references('id')->on('nationalities')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('father_blood_type_id')->references('id')->on('blood__types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('father_religion_id')->references('id')->on('religions')->onUpdate('cascade')->onDelete('cascade');

            $table->foreignId('mother_nationality_id')->references('id')->on('nationalities')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('mother_blood_type_id')->references('id')->on('blood__types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('mother_religion_id')->references('id')->on('religions')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('my_parents');
    }
}
