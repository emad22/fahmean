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
        Schema::create('teacher_requests', function (Blueprint $table) {
            $table->id();
            $table->string('frist_name');
            $table->string('last_name');
            $table->string('phone_num');
            $table->integer('students_num')->nullable();
            $table->string('address');
            $table->string('email');
            $table->string('academic_level');
            $table->string('subject_name');
            $table->string('facebook_link')->nullable();
            $table->text('work_experience');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_requests');
    }
};
