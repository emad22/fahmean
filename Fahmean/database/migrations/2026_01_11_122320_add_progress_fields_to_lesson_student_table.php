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
        Schema::table('lesson_student', function (Blueprint $table) {
            $table->integer('progress')->default(0)->after('completed');
            $table->timestamp('last_accessed_at')->nullable()->after('progress');
            $table->timestamp('completed_at')->nullable()->after('last_accessed_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lesson_student', function (Blueprint $table) {
            //
        });
    }
};
