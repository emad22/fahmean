<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Student;
use App\Models\EducationLevel;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        $education_levels = EducationLevel::all();
        return view('pages.register', compact('education_levels'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'               => 'required|string|max:255',
            'email'              => 'required|string|email|max:255|unique:users',
            'phone_number'       => 'required|string|max:20',
            'parent_phone'       => 'required|string|max:20',
            'academic_year'      => 'required|string|max:20',
            'password'           => 'required|string|min:8|confirmed',
            'education_level_id' => 'required|exists:education_levels,id',
            'grade_id'           => 'required|exists:grades,id',
        ], [
            'name.required'               => 'الاسم مطلوب',
            'email.required'              => 'البريد الإلكتروني مطلوب',
            'email.email'                 => 'البريد الإلكتروني غير صحيح',
            'email.unique'                => 'البريد الإلكتروني مستخدم بالفعل',
            'phone_number.required'       => 'رقم هاتف الطالب مطلوب',
            'parent_phone.required'       => 'رقم هاتف ولي الأمر مطلوب',
            'academic_year.required'      => 'العام الدراسي مطلوب',
            'password.required'           => 'كلمة المرور مطلوبة',
            'password.min'                => 'كلمة المرور يجب أن تكون 8 أحرف على الأقل',
            'password.confirmed'          => 'كلمتا المرور غير متطابقتين',
            'education_level_id.required' => 'المرحلة الدراسية مطلوبة',
            'grade_id.required'           => 'الصف الدراسي مطلوب',
        ]);

        DB::beginTransaction();

        try {
            $user = User::create([
                'name'         => $request->name,
                'email'        => $request->email,
                'phone_number' => $request->phone_number,
                'password'     => Hash::make($request->password),
            ]);

            $user->assignRole('student');

            Student::create([
                'user_id'              => $user->id,
                'education_level_id'   => $request->education_level_id,
                'grade_id'             => $request->grade_id,
                'status'               => 'approved',
                'student_phone_number' => $request->phone_number,
                'parent_phone_number'  => $request->parent_phone,
                'academic_year'        => $request->academic_year,
                'student_code'         => 'ST-' . str_pad($user->id, 5, '0', STR_PAD_LEFT),
            ]);

            DB::commit();

            Auth::login($user);

            return redirect('/dashboard')->with('success', 'تم التسجيل بنجاح! مرحباً بك في فاهمين.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->withErrors([
                'error' => 'حدث خطأ أثناء التسجيل، يرجى المحاولة مرة أخرى. ' . $e->getMessage()
            ]);
        }
    }

    public function getGrades($levelId)
    {
        $grades = Grade::where('education_level_id', $levelId)->get();
        return response()->json($grades);
    }
}
