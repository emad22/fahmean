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
        Schema::table('lessons', function (Blueprint $table) {
            $table->string('video')->nullable()->after('title');
            $table->string('pdf')->nullable()->after('video');
            $table->string('audio')->nullable()->after('pdf');
            $table->string('duration')->nullable()->after('audio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->dropColumn(['video', 'pdf', 'audio', 'duration']);
        });
    }
};
