<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name',700);
            $table->string('email')->unique();
            $table->string('password');
            $table->date('date_of_birth');
            $table->string('academic_year');
            $table->softDeletes();
            $table->timestamps();

            $table->foreignId('gender_id')->references('id')->on('genders')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('blood_type_id')->references('id')->on('blood__types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('nationality_id')->references('id')->on('nationalities')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('grade_id')->references('id')->on('grades')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('classroom_id')->references('id')->on('classrooms')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('section_id')->references('id')->on('sections')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('parent_id')->references('id')->on('my_parents')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
