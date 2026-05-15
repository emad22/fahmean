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
        Schema::table('users', function (Blueprint $table) {
            $table->string('headline')->nullable()->after('profile_image');
            $table->text('bio')->nullable()->after('headline');
            $table->text('about_me')->nullable()->after('bio');
            $table->string('video_url')->nullable()->after('about_me');
            $table->string('facebook_url')->nullable()->after('video_url');
            $table->string('twitter_url')->nullable()->after('facebook_url');
            $table->string('instagram_url')->nullable()->after('twitter_url');
            $table->string('linkedin_url')->nullable()->after('instagram_url');
            $table->integer('experience_years')->nullable()->after('linkedin_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'headline',
                'bio',
                'about_me',
                'video_url',
                'facebook_url',
                'twitter_url',
                'instagram_url',
                'linkedin_url',
                'experience_years'
            ]);
        });
    }
};
