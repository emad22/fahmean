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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // اسم الكورس
            $table->decimal('price', 8, 2)->nullable(); // سعر الكورس
            $table->string('image')->nullable(); // صورة الكورس
            $table->string('video_source')->nullable(); // مصدر الفيديو (يوتيوب، فيميو، محلي)
            $table->string('video_url')->nullable(); // رابط الفيديو
            $table->unsignedBigInteger('teacher_id'); // معرف المدرس
            $table->enum('status', ['draft', 'published'])->default('draft'); // حالة الكورس
            $table->timestamps();
            // إنشاء العلاقة مع جدول المعلمين
            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
