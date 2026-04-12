<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('quiz_student', function (Blueprint $table) {
            $table->integer('attempt_count')->default(1)->after('completed');
        });
    }

    public function down(): void
    {
        Schema::table('quiz_student', function (Blueprint $table) {
            $table->dropColumn('attempt_count');
        });
    }
};
