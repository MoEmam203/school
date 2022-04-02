<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');

            $table->foreignId('grade_from')->references('id')->on('grades')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('classroom_from')->references('id')->on('classrooms')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('section_from')->references('id')->on('sections')->onUpdate('cascade')->onDelete('cascade');

            $table->foreignId('grade_to')->references('id')->on('grades')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('classroom_to')->references('id')->on('classrooms')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('section_to')->references('id')->on('sections')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotions');
    }
}
