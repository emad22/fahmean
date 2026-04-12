<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Subject;

class StudentController extends Controller
{
	public function assignSubjects($id)
	{
		$student = Student::findOrFail($id);
		$subjects = Subject::all();

		return view('admin.students.subjects', compact('student', 'subjects'));
	}

}