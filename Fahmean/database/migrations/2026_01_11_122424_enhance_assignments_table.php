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
        Schema::table('assignments', function (Blueprint $table) {
            $table->text('description')->nullable()->after('title');
            $table->string('attachment')->nullable()->after('description'); // Teacher's reference file
            $table->timestamp('due_date')->nullable()->after('attachment');
            $table->integer('max_score')->default(100)->after('due_date');
            $table->boolean('allow_late_submission')->default(false)->after('max_score');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assignments', function (Blueprint $table) {
            //
        });
    }
};
