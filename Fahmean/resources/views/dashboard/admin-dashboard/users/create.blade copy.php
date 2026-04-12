@extends('layout.layout')

@php
$header='false';
$footer='false';
$topToBottom='false';
$bodyClass='';
@endphp

@section('content')

<x-background />

<div class="rbt-dashboard-area rbt-section-overlayping-top rbt-section-gapBottom">
    <div class="container">
        <div class="row">

            <!-- Sidebar -->
            <div class="col-lg-3">
                @include('layout.sidebar')
            </div>

            <div class="col-lg-9">
                <div class="rbt-dashboard-content bg-color-white rbt-shadow-box mb--60">
                    <div class="content">

                        <div class="section-title mb--20">
                            <h4 class="rbt-title-style-3">إضافة مستخدم جديد</h4>
                        </div>


                        <div class="col-12">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        <form action="{{ route('admin.users.store') }}" method="POST">
                            @csrf

                            <div class="row g-4">

                                <!-- Name -->
                                <div class="col-lg-6">
                                    <label class="form-label">الإسم</label>
                                    <input type="text" name="name" class="form-control">
                                </div>

                                <!-- Email -->
                                <div class="col-lg-6">
                                    <label class="form-label">البريد الإلكتروني</label>
                                    <input type="email" name="email" class="form-control">
                                </div>

                                <!-- Password -->
                                <div class="col-lg-6">
                                    <label class="form-label">كلمة المرور</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <!-- Phone Number -->
                                <div class="col-lg-6">
                                    <label class="form-label">رقم الهاتف</label>
                                    <input type="text" name="phone_number" class="form-control">
                                </div>

                                <!-- Role -->
                                <div class="col-lg-6">
                                    <label class="form-label">الدور (Role)</label>
                                    <select name="role" id="roleSelect" class="form-control">
                                        <option value="">اختر الدور</option>
                                        @foreach($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Education Level -->
                                <div class="col-lg-6 d-none" id="educationLevelField">
                                    <label class="form-label">المرحلة التعليمية</label>
                                    <select name="education_level_id"  id="educationLevel" class="form-control">
                                        <option value="">اختر المرحلة</option>
                                        @foreach($education_levels as $level)
                                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Grade -->
                                <div class="col-lg-6 d-none" id="gradeField">
                                    <label class="form-label">الصف الدراسي</label>
                                    <select name="grade_id"  id="grade" class="form-control">
                                        <option value="">اختر الصف</option>
                                    </select>
                                </div>

                                <!-- Subjects (Teacher only) -->
                                <div class="col-lg-12 d-none" id="subjectsField">
                                    <label class="form-label">المواد</label>
                                    <select name="subjects"  id="subjects" class="form-control selectpicker" data-live-search="true">
                                        @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12">
                                    <button class="rbt-btn btn-gradient">
                                        إنشاء مستخدم
                                    </button>
                                </div>

                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<x-separator />

<!-- JS Logic -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.getElementById('roleSelect').addEventListener('change', function() {
        const role = this.value;

        document.getElementById('educationLevelField').classList.add('d-none');
        document.getElementById('gradeField').classList.add('d-none');
        document.getElementById('subjectsField').classList.add('d-none');

        if (role === "teacher") {
            document.getElementById("educationLevelField").classList.remove("d-none");
            document.getElementById("gradeField").classList.remove("d-none");
            document.getElementById("subjectsField").classList.remove("d-none");

            // 🔥 شغّل التحديث من جديد
            document.getElementById("educationLevel").dispatchEvent(new Event('change'));
        }

        if (role === "student") {
            document.getElementById('educationLevelField').classList.remove('d-none');
            document.getElementById('gradeField').classList.remove('d-none');

            document.getElementById("educationLevel").dispatchEvent(new Event('change'));
        }
    });

</script>
<script>
  $(document).on('change', '#educationLevel', function () {
    let levelIds = $(this).val(); // array
    if (!levelIds || levelIds.length === 0) {
        $('#grade').empty().selectpicker('refresh');
        $('#subjects').empty().selectpicker('refresh');
        return;
    }

    $.ajax({
        url: "{{ route('admin.get-grades-by-levels') }}",
        type: "GET",
        data: { level_ids: levelIds },
        success: function(data) {
            let gradeSelect = document.getElementById('grade');
            gradeSelect.innerHTML = '';

            data.forEach(function (g) {
                let option = document.createElement("option");
                option.value = g.id;
                option.textContent = g.name;
                gradeSelect.appendChild(option);
            });

            $('#grade').selectpicker('refresh');
            $('#subjects').empty().selectpicker('refresh');
        }
    });
});


</script>
<script>
  $(document).on('change', '#grade', function () {

    let gradeIds = $(this).val(); // array

    if (!gradeIds || gradeIds.length === 0) {
        $('#subjects').empty().selectpicker('refresh');
        return;
    }

    $.ajax({
        url: "{{ route('admin.get-subjects-by-grades') }}",
        type: "GET",
        data: { grade_ids: gradeIds },
        success: function(data) {
            let subjectsSelect = document.getElementById('subjects');
            subjectsSelect.innerHTML = '';

            data.forEach(function (item) {
                let option = document.createElement("option");
                option.value = item.id;
                option.textContent = item.name;
                subjectsSelect.appendChild(option);
            });

            $('#subjects').selectpicker('refresh');
        }
    });
});


</script>

@endsection