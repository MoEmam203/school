<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->string('name',700);
            $table->decimal('amount',8,2);
            $table->text('description')->nullable();
            $table->integer('year');
            $table->timestamps();

            $table->foreignId('grade_id')->references('id')->on('grades')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('classroom_id')->references('id')->on('classrooms')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fees');
    }
}
