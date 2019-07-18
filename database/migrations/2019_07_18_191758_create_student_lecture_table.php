<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentLectureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_lecture', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('lecture_id')->nullable();
            $table->timestamps();
        });
        Schema::table('student_lecture', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students')->onDelete('set null');
            $table->foreign('lecture_id')->references('id')->on('lectures')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_lecture');
    }
}
