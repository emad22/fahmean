<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Course;
use App\Models\Section;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Subject;

class InteractiveQuizExampleSeeder extends Seeder
{
    public function run()
    {
        // 1. تأكد من وجود مدرس وطالب للتجربة
        $teacher = User::role('teacher')->first() ?: User::factory()->create()->assignRole('teacher');
        $student = User::role('student')->first() ?: User::factory()->create()->assignRole('student');
        $subject = Subject::first() ?: Subject::create(['name' => 'اللغة العربية']);

        // 2. إنشاء الكورس
        $course = Course::create([
            'title' => 'مثال كامل: اختبار تفاعلي وتصحيح تلقائي',
            'description' => 'هذا الكورس مصمم لاستعراض ميزة الاختبارات الجديدة. قم بالدخول كطالب لتجربة الحل.',
            'price' => 100,
            'teacher_id' => $teacher->id,
            'subject_id' => $subject->id,
            'status' => 'published',
        ]);

        // 3. إنشاء الأقسام
        $section = Section::create([
            'course_id' => $course->id,
            'title' => 'المرحلة الأولى: أساسيات النحو',
        ]);

        // 4. إنشاء الامتحان
        $quiz = Quiz::create([
            'section_id' => $section->id,
            'title' => 'اختبار تحديد المستوى في النحو',
            'type' => 'monthly',
        ]);

        // 5. إضافة الأسئلة (مثال MCQ)
        $q1 = Question::create([
            'quiz_id' => $quiz->id,
            'question' => 'ما هو الفاعل في جملة "شربَ الولدُ اللبنَ"؟',
            'type' => 'multiple_choice',
        ]);

        Answer::create(['question_id' => $q1->id, 'answer' => 'الولدُ', 'is_correct' => 1]);
        Answer::create(['question_id' => $q1->id, 'answer' => 'اللبنَ', 'is_correct' => 0]);
        Answer::create(['question_id' => $q1->id, 'answer' => 'شربَ', 'is_correct' => 0]);

        // 6. إضافة سؤال (مثال صح وخطأ)
        $q2 = Question::create([
            'quiz_id' => $quiz->id,
            'question' => 'الفعل المضارع دائماً ما يكون مبنياً.',
            'type' => 'true_false',
        ]);

        Answer::create(['question_id' => $q2->id, 'answer' => 'خطأ', 'is_correct' => 1]);
        Answer::create(['question_id' => $q2->id, 'answer' => 'صح', 'is_correct' => 0]);

        // 7. تسجيل الطالب في هذا الكورس ليظهر لديه
        $course->students()->syncWithoutDetaching([$student->id => ['status' => 'active']]);

        $this->command->info('تم إنشاء المثال الكامل بنجاح! يمكن للطالب (' . $student->email . ') الآن الدخول للكورس وحل الامتحان.');
    }
}
