<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_course_allocates', function (Blueprint $table) {
            $table->id();

            // $table->unsignedBigInteger('login_mails_id');
            // $table->unsignedBigInteger('course_id');

            // // Define foreign key constraints
            // $table->foreign('login_mails_id')->references('id')->on('login_mails')->onDelete('cascade');
            // $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

            $table->id('department_id');
            $table->id('college_id');
            $table->id('batch_id');
            $table->id('course_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_course_allocates');
    }
};
