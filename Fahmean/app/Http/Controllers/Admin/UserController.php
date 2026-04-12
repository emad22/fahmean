<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EducationLevel;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash as FacadesHash;
// use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Role;


use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UserController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view user', only: ['index', 'show']),
            new Middleware('permission:create user', only: ['create', 'store']),
            new Middleware('permission:edit user', only: ['edit', 'update']),
            new Middleware('permission:delete user', only: ['destroy']),
        ];
    }
     public function index(Request $request)
    {
        $query = User::with('roles');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }
        
        if ($request->has('role') && $request->role != '') {
             $query->role($request->role);
        }

        $users = $query->latest()->paginate(20);

        // Stats for the "WOW" Factor
        $stats = [
            'total' => User::count(),
            'students' => User::role('student')->count(),
            'teachers' => User::role('teacher')->count(),
            'parents' => User::role('parent')->count(),
        ];

        return view('dashboard.admin-dashboard.users.index', compact('users', 'stats'));
    }

    public function create()
    {
        $education_levels = EducationLevel::all();
        $subjects = Subject::all();
        $grades = Grade::all();
        $roles = Role::all();
        $teachers = User::role('teacher')->get();
        // Fetch Students with User info
        $students = Student::has('user')->with('user')->get();
        return view('dashboard.admin-dashboard.users.create', compact('education_levels', 'subjects', 'grades', 'roles', 'teachers', 'students'));
    }



    public function store(Request $request)
    {

        // dd($request->all());
        // 1) Validate
        $validated = $request->validate([
            'name'              => 'required|string|max:191',
            'email'             => 'required|email|unique:users,email',
            'password'          => 'required|min:6',
            'role'              => 'required|string',
            'education_level_id' => 'nullable',
            'grade_id'          => 'nullable',
            'subjects'          => 'nullable',
            'profile_image'     => 'nullable|image|max:2048',
        ]);

        // 2) Upload profile image if exists
        $imagePath = null;
        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('profiles', 'public');
        }

        // 3) Create user
        $user = User::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => bcrypt($request->password),
            'profile_image' => $imagePath,
            'teacher_id'    => $request->role === 'assistant_teacher' ? $request->teacher_id : null,
        ]);

        // 4) Assign role (Spatie)
        $user->assignRole($request->role);

        // ===========================================================
        // 🔵 CASE 1: STUDENT
        // ===========================================================
        if ($request->role === 'student') {
            // Extract single value if array
            $eduLevel = is_array($request->education_level_id) ? ($request->education_level_id[0] ?? null) : $request->education_level_id;
            $gradeId  = is_array($request->grade_id) ? ($request->grade_id[0] ?? null) : $request->grade_id;

            Student::create([
                'user_id'            => $user->id,
                'education_level_id' => $eduLevel,
                'grade_id'           => $gradeId,
                'status'             => 'approved',
                'student_phone_number' => $request->student_phone_number,
            ]);
        }

        // ===========================================================
        // 🟣 CASE 2: TEACHER
        // ===========================================================
        if ($request->role === 'teacher') {
            // حفظ علاقة المدرس بالمادة (مادة واحدة فقط)
            if ($request->filled('subject_id')) {
                $user->subjects()->sync([$request->subject_id]);
            }
             // حفظ علاقة المدرس بالمراحل الدراسية
            if ($request->filled('education_level_id')) {
                $ids = is_array($request->education_level_id) ? $request->education_level_id : [$request->education_level_id];
                $user->educationLevels()->sync($ids);
            }

            // حفظ علاقة المدرس بالصفوف
            if ($request->filled('grade_id')) {
                $gIds = is_array($request->grade_id) ? $request->grade_id : [$request->grade_id];
                $user->grades()->sync($gIds);
            }
        }

        // ===========================================================
        // 🟢 CASE 3: PARENT
        // ===========================================================
        if ($request->role === 'parent') {
            // phone_number محفوظ بالفعل في جدول users
            if ($request->has('phone_number')) {
                $user->phone_number = $request->phone_number;
                $user->save();
            }

            // ربط الطالب بالوالد
            if ($request->has('students')) {
                foreach ($request->students as $student_id) {
                    DB::table('parent_student')->insert([
                        'parent_id'  => $user->id,
                        'student_id' => $student_id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }

        return redirect()->route('admin.users.index')->with('success', 'تم إنشاء المستخدم بنجاح');
    }





    // SHOW
    public function show($id)
    {
        $user = User::with('roles')->findOrFail($id);
        return view('dashboard.admin-dashboard.users.show', compact('user'));
    }

   

    public function edit($id)
    {
        // 1) Get user
        $user = User::with([
            'student',                // بيانات الطالب لو المستخدم Student
            'subjects',      // مواد المدرس لو Instructor
            'children'       // أبناء ولي الأمر
        ])->findOrFail($id);

        // 2) Get roles (Spatie)
        $roles = Role::all();

        // 3) Get dropdown data
        $education_levels = EducationLevel::all();
        $grades = Grade::all();
        $subjects = Subject::all();
        $teachers = User::role('teacher')->get();
        $students = Student::has('user')->with('user')->get();

        return view('dashboard.admin-dashboard.users.edit', [
            'user'              => $user,
            'roles'             => $roles,
            'education_levels'  => $education_levels,
            'grades'            => $grades,
            'subjects'          => $subjects,
            'teachers'          => $teachers,
            'students'          => $students,
        ]);
    }



    public function update(Request $request, $id)
    {
        $user = User::with(['student', 'subjects'])->findOrFail($id);

        // ===============================
        // 1) Validation
        // ===============================
        $validated = $request->validate([
            'name'     => 'required|string|max:191',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',

            'role' => 'required|string',

            'education_level_id' => 'nullable',
            'grade_id'           => 'nullable',

            'subjects' => 'nullable|array',

            'student_phone_number' => 'nullable|string|max:20',

            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        // ===============================
        // 2) Update BASIC USER DATA
        // ===============================
        $user->name = $request->name;
        $user->email = $request->email;

        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }

        // ===============================
        // 3) Update Profile Image
        // ===============================
        if ($request->hasFile('profile_image')) {

            // احذف الصورة القديمة لو موجودة
            if ($user->profile_image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($user->profile_image);
            }

            $imagePath = $request->file('profile_image')->store('profiles', 'public');
            $user->profile_image = $imagePath;
        }

        if ($request->role === 'assistant_teacher') {
            $user->teacher_id = $request->teacher_id;
        } else {
            $user->teacher_id = null;
        }

        $user->save();

        // ===============================
        // 4) UPDATE ROLE (Spatie)
        // ===============================
        $user->syncRoles([$request->role]);

        // ===========================================================
        // 🟢 CASE 1: UPDATE STUDENT
        // ===========================================================
        if ($request->role === 'student') {

            if ($user->student) {
                // update existing student record
                $eduLevel = is_array($request->education_level_id) ? ($request->education_level_id[0] ?? null) : $request->education_level_id;
                $gradeId  = is_array($request->grade_id) ? ($request->grade_id[0] ?? null) : $request->grade_id;
                
                $user->student->update([
                    'education_level_id' => $eduLevel,
                    'grade_id'           => $gradeId,
                    'student_phone_number' => $request->student_phone_number,
                ]);
            } else {
                // create new student record if not exists
                $eduLevel = is_array($request->education_level_id) ? ($request->education_level_id[0] ?? null) : $request->education_level_id;
                $gradeId  = is_array($request->grade_id) ? ($request->grade_id[0] ?? null) : $request->grade_id;

                Student::create([
                    'user_id' => $user->id,
                    'education_level_id' => $eduLevel,
                    'grade_id' => $gradeId,
                    'student_phone_number' => $request->student_phone_number,
                    'status' => 'approved',
                ]);
            }
        }

        // ===========================================================
        // 🟣 CASE 2: UPDATE TEACHER
        // ===========================================================
        if ($request->role === 'teacher') {

            // Sync subject for teacher (single subject)
            if ($request->filled('subject_id')) {
                $user->subjects()->sync([$request->subject_id]);
            } else {
                $user->subjects()->sync([]); // remove all
            }

             // Teacher Levels
             if ($request->filled('education_level_id')) {
                $ids = is_array($request->education_level_id) ? $request->education_level_id : [$request->education_level_id];
                $user->educationLevels()->sync($ids);
            } else {
                $user->educationLevels()->detach();
            }

            // Teacher Grades
            if ($request->filled('grade_id')) {
                $gIds = is_array($request->grade_id) ? $request->grade_id : [$request->grade_id];
                $user->grades()->sync($gIds);
            } else {
                $user->grades()->detach();
            }
        }

        // ===========================================================
        // 🔵 CASE 3: UPDATE PARENT
        // ===========================================================
        if ($request->role === 'parent') {

            $user->phone_number = $request->phone_number;
            $user->save();

            if ($request->has('students')) {
                DB::table('parent_student')
                    ->where('parent_id', $user->id)
                    ->delete();

                foreach ($request->students as $student_id) {
                    DB::table('parent_student')->insert([
                        'parent_id'  => $user->id,
                        'student_id' => $student_id,
                        'created_at' => now(),
                    ]);
                }
            }
        }

        return redirect()->route('admin.users.index')
            ->with('success', 'تم تحديث بيانات المستخدم بنجاح');
    }


    // ============================
    // DELETE
    // ============================
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->student) {
            $user->student->delete();
        }
        $user->delete();
        return back()->with('success', 'User deleted');
    }



    public function getGrades($levelId)
    {
        $grades = Grade::where('education_level_id', $levelId)->get();
        return response()->json($grades);
        
    }

    public function getSubjects($gradeId)
    {
        $subjects = Subject::where('grade_id', $gradeId)->get()->unique('name'); // إزالة التكرار بناءً على الاسم;
        return response()->json($subjects);
    }


    public function getGradesByLevels(Request $request)
    {
        $levelIds = $request->level_ids;

        // إذا كانت القيمة واحدة وحصلنا string بدل array
        if (!is_array($levelIds)) {
            $levelIds = [$levelIds];
        }

        // لو فاضي، رجع array فاضي
        if (empty($levelIds)) {
            return response()->json([]);
        }

        $grades = Grade::whereIn('education_level_id', $levelIds)->get();

        return response()->json($grades);
    }

    public function getSubjectsByGrades(Request $request)
    {
        $gradeIds = $request->grade_ids;

        // إذا كانت القيمة واحدة وتحصلنا string بدل array
        if (!is_array($gradeIds)) {
            $gradeIds = [$gradeIds];
        }

        // لو فاضي، رجع array فاضي
        if (empty($gradeIds)) {
            return response()->json([]);
        }

        $subjects = Subject::whereIn('grade_id', $gradeIds)
            ->get()
            ->unique('name'); // إزالة التكرار بناءً على الاسم

        return response()->json($subjects);
    }
    
    public function searchStudents(Request $request)
    {
        $search = $request->get('q');
        $students = User::role('student')
            ->where(function($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                      ->orWhere('email', 'like', "%$search%");
            })
            ->select('id', 'name', 'email')
            ->limit(10)
            ->get();

        return response()->json($students);
    }
}

