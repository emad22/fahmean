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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
			$table->foreignId('user_id')->constrained()->cascadeOnDelete();

			$table->foreignId('education_level_id')->nullable()->constrained()->nullOnDelete();
			$table->foreignId('grade_id')->nullable()->constrained()->nullOnDelete();
			$table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            // المدرس المسؤول
            $table->foreignId('teacher_id')->nullable()->constrained('users')->nullOnDelete();
			$table->string('student_code')->nullable(); // اختياري
			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
