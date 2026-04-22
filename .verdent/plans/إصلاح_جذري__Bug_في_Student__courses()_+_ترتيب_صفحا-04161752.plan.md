
## المشكلة الجذرية — Bug في العلاقات

```
course_student.student_id  →  FK يشير لـ users.id  ✅ (صح في DB)

User::courses()     → belongsToMany('course_student', student_id=users.id)  ✅ صح
Student::courses()  → belongsToMany('course_student', student_id=students.id) ❌ غلط
```

**النتيجة:** كل مكان يستخدم `$student->courses()` يرجع فارغاً دائماً لأن `students.id ≠ users.id` في الـ pivot.

---

## دورة الحياة الصحيحة للمنصة

```mermaid
flowchart LR
    A[الطالب يسجّل] --> B[/dashboard = داشبورد/]
    B --> C[/dashboard/available-courses\nالكورسات المتاحة حسب الصف]
    C -->|طلب تسجيل| D[enrollment_requests pending]
    D --> E[/admin/enrollment-requests\nلوحة الأدمن/المدرس]
    E -->|يوافق| F[course_student مُضاف]
    F --> G[/dashboard/courses\nكورساتي المسجّلة]
    G -->|يدخل كورس| H[/dashboard/courses/{id}\nمحتوى الكورس]
```

---

## الإصلاحات المطلوبة (6 ملفات فقط)

### 1. `app/Models/Student.php`
إضافة علاقة `courses()` صحيحة تعمل عبر `user_id`:
```php
public function courses()
{
    // course_student.student_id = users.id → نصل إليه عبر user_id
    return $this->hasMany(\DB::table('course_student')... 
    // الأفضل: استخدام User model من خلال user_id
}
```
**الحل الأبسط:** استخدام `User::courses()` من خلال العلاقة:
```php
public function enrolledCourses()
{
    return Course::whereHas('students', fn($q) => $q->where('users.id', $this->user_id));
}
```

---

### 2. `app/Http/Controllers/Student/DashboardController.php`
استبدال كل `$student->courses()` بـ `auth()->user()->courses()`:

```php
// ❌ غلط
$enrolledCoursesCount = $student->courses()->count();

// ✅ صح
$enrolledCoursesCount = auth()->user()->courses()->count();
```

---

### 3. `app/Http/Controllers/Student/CourseController.php`
استبدال `$student->courses` بـ `auth()->user()->courses()`:

```php
// ❌ غلط (يرجع فارغ دائماً)
$enrolled = $student->courses;

// ✅ صح
$enrolled = auth()->user()->courses()->withPivot('status','progress')->get();
```

---

### 4. `app/Http/Controllers/Unified/CourseController.php`
إعادة `/dashboard/courses` للطالب لصفحة "كورساتي المسجّلة":
```php
// كانت تفتح available-courses — نعود لـ StudentCourseController
if ($user->hasRole('student')) {
    return app(StudentCourseController::class)->index();
}
```

---

### 5. `resources/views/dashboard/admin-dashboard/student-enrolled-courses.blade.php`
التحقق من الـ view الحالية وإصلاح عرض الكورسات المسجّلة للطالب.

---

### 6. Sidebar — فصل الروابط
```
للطالب:
├── 📚 كورساتي       →  /dashboard/courses        (enrolled)
├── 🔍 كورسات متاحة  →  /dashboard/available-courses (browse)
└── 📋 طلباتي        →  /dashboard/my-enrollment-requests
```

---

## ملخص الصفحات النهائية

| الرابط | من يراه | الغرض |
|--------|---------|-------|
| `/dashboard` | الطالب | داشبورد رئيسي + إحصائيات صحيحة |
| `/dashboard/available-courses` | الطالب | تصفح كورسات صفّه + طلب التسجيل |
| `/dashboard/my-enrollment-requests` | الطالب | حالة طلباته |
| `/dashboard/courses` | الطالب | الكورسات المسجّل فيها بعد الموافقة |
| `/dashboard/courses/{id}` | الطالب | محتوى الكورس |
| `/dashboard/enrollment-requests` | أدمن/مدرس | قائمة كل الطلبات + Enroll/Reject/Unenroll |
