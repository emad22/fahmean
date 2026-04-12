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
            if (!Schema::hasColumn('course_student', 'progress')) {
                if (Schema::hasColumn('course_student', 'progress_percentage')) {
                    $table->renameColumn('progress_percentage', 'progress');
                } else {
                    $table->integer('progress')->default(0)->after('student_id');
                }
            }
            
            if (!Schema::hasColumn('course_student', 'status')) {
                $table->string('status')->default('active')->after('progress');
            }
            
            if (!Schema::hasColumn('course_student', 'enrolled_at')) {
                $table->timestamp('enrolled_at')->nullable()->after('status');
            }
            
            if (!Schema::hasColumn('course_student', 'completed_at')) {
                $table->timestamp('completed_at')->nullable()->after('enrolled_at');
            }
        });

        Schema::table('lesson_student', function (Blueprint $table) {
            if (!Schema::hasColumn('lesson_student', 'progress')) {
                if (Schema::hasColumn('lesson_student', 'progress_percentage')) {
                    $table->renameColumn('progress_percentage', 'progress');
                } else {
                    $table->integer('progress')->default(0)->after('completed');
                }
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No need for down in a fix migration
    }
};
