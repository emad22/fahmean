@extends('layout.dashboard')
@section('dashboard-content')
<div class="p-5">
    <h2>اختبار إرسال البيانات (Test Form)</h2>
    <form action="{{ route('student.quizzes.submit', ['course_id' => 1, 'id' => 1]) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>سؤال تجريبي (القيمة ستظهر في الـ dd)</label>
            <input type="text" name="test_field" value="Hello World" class="form-control">
        </div>
        <button type="submit" class="btn btn-danger">اضغط هنا لاختبار الإرسال (Submit Test)</button>
    </form>
</div>
@endsection
