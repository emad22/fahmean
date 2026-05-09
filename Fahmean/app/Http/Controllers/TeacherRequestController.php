<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherRequestController extends Controller
{
    public function index()
    {
        $requests = \App\Models\TeacherRequest::orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard.admin-dashboard.teacher-requests.index', compact('requests'));
    }

    public function create()
    {
        return view('pages.teacher-request');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'academic_level' => 'required|string',
            'subject_name' => 'required|string|max:255',
            'frist_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_num' => 'required|numeric',
            'address' => 'required|string|max:255',
            'work_experience' => 'required|string',
            'facebook_link' => 'nullable|string|max:255',
            'students_num' => 'nullable|numeric',
        ]);

        $teacherRequest = \App\Models\TeacherRequest::create($validated);

        // Send email to admin
        \Illuminate\Support\Facades\Mail::send('emails.teacher-request-admin', ['data' => $teacherRequest], function ($message) use ($teacherRequest) {
            $message->to('info@ustazy.com')
                ->subject('طلب جديد للانضمام كمعلم - ' . $teacherRequest->frist_name . ' ' . $teacherRequest->last_name);
        });

        return back()->with('success', 'تم إرسال طلبك بنجاح، سنقوم بالتواصل معك قريباً.');
    }

    public function markAsRead($id)
    {
        $request = \App\Models\TeacherRequest::findOrFail($id);
        $request->update(['is_read' => true]);
        return response()->json(['success' => true]);
    }
}
