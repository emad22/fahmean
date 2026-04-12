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
        Schema::table('course_student', function (Blueprint $table) {
            $table->integer('progress')->default(0)->after('student_id');
            $table->string('status')->default('active')->after('progress');
            $table->timestamp('enrolled_at')->nullable()->after('status');
            $table->timestamp('completed_at')->nullable()->after('enrolled_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('course_student', function (Blueprint $table) {
            //
        });
    }
};
