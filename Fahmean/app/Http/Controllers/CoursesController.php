<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CoursesController extends Controller
{

    public function courseCard2()
    {
        return view('courses/courseCard2');
    }

    public function courseCard3()
    {
        return view('courses/courseCard3');
    }

    public function courseDetails(Request $request, $id = null)
    {
        $id = $id ?? $request->query('id');
        if ($id) {
            $course = Course::with([
                'sections.lessons',
                'sections.quizzes',
                'teacher',
                'subject.grade',
            ])->find($id);
        } else {
            $course = Course::with([
                'sections.lessons',
                'sections.quizzes',
                'teacher',
                'subject.grade',
            ])->where('status', 'active')->first() ?? Course::with([
                'sections.lessons',
                'sections.quizzes',
                'teacher',
                'subject.grade',
            ])->first();
        }

        if (!$course) {
            $course = new Course([
                'title' => 'كورس اللغة العربية الشامل',
                'description' => 'تعلم مهارات اللغة العربية من النحو والبلاغة والأدب مع نخبة من كبار المعلمين لضمان الدرجات النهائية.',
                'requirements' => 'شغف لتعلم اللغة العربية.',
                'level' => 'المرحلة الثانوية',
                'price' => 0,
                'academic_year' => 'الصف الثالث الثانوي',
            ]);
        }

        return view('courses/courseDetails', compact('course'));
    }

    public function courseDetails2()
    {
        return view('courses/courseDetails2');
    }

    public function courseDetails3()
    {
        return view('courses/courseDetails3');
    }

    public function courseFilterOneOpen()
    {
        return view('courses/courseFilterOneOpen');
    }

    public function courseFilterOneToggle()
    {
        return view('courses/courseFilterOneToggle');
    }

    public function courseFilterTwoOpen()
    {
        return view('courses/courseFilterTwoOpen');
    }

    public function courseFilterTwoToggle()
    {
        return view('courses/courseFilterTwoToggle');
    }

    public function courseMasonry()
    {
        return view('courses/courseMasonry');
    }

    public function courseWithSidebar()
    {
        return view('courses/courseWithSidebar');
    }

    public function courseWithTab()
    {
        return view('courses/courseWithTab');
    }

    public function courseWithTabTwo()
    {
        return view('courses/courseWithTabTwo');
    }

    public function createCourse()
    {
        return view('courses/createCourse');
    }

    public function instructorCourse()
    {
        return view('courses/instructorCourse');
    }

    public function lesson()
    {
        return view('courses/lesson');
    }

}
