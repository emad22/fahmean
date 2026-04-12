<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Show the profile edit form.
     */
    public function edit()
    {
        $user = auth()->user()->load(['student.level', 'student.grade', 'subjects']);
        return view('dashboard.profile', compact('user'));
    }

    /**
     * Update the profile.
     */
    public function update(Request $request)
    {
        $user = auth()->user(); // Get the currently authenticated user instance

        $request->validate([
            'name'          => 'required|string|max:191',
            'email'         => 'required|email|unique:users,email,' . $user->id,
            'password'      => 'nullable|string|min:6|confirmed',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'phone'         => 'nullable|string|max:20', 
        ]);

        // 1. Basic Info
        $user->name = $request->name;
        $user->email = $request->email;

        // 2. Password
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // 3. Image Upload
        if ($request->hasFile('profile_image')) {
            // Delete old image if exists
            if ($user->profile_image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($user->profile_image);
            }

            $imagePath = $request->file('profile_image')->store('profiles', 'public');
            $user->profile_image = $imagePath;
        }

        // 4. Role Specific Data (Phone)
        // Parent uses 'phone_number' in users table
        if ($user->hasRole('parent')) {
            $user->phone_number = $request->phone;
        }
        // Student uses 'student_phone_number' in students table
        elseif ($user->hasRole('student') && $user->student) {
            $user->student->update(['student_phone_number' => $request->phone]);
        }
        
        // Note: Teachers subjects logic is intentionally EXCLUDED to prevent self-editing.
        
        $user->save();

        return redirect()->back()->with('success', 'تم تحديث البيانات الشخصية بنجاح.');
    }
}
