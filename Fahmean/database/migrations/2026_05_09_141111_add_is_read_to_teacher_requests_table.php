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
        Schema::table('teacher_requests', function (Blueprint $col) {
            $col->boolean('is_read')->default(false)->after('work_experience');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teacher_requests', function (Blueprint $col) {
            $col->dropColumn('is_read');
        });
    }
};
