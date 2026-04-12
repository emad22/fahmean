@extends('layout.dashboard')

@php
    $header = 'false';
    $footer = 'false';
    $topToBottom = 'false';
    $bodyClass = '';
@endphp

@section('dashboard-content')
    <!-- Custom Style for User Cards -->
    <style>
        .rbt-stat-card {
            background: #fff;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(0, 0, 0, 0.03);
            display: flex;
            align-items: center;
        }

        .rbt-stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .rbt-stat-card .icon-box {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-inline-end: 15px;
        }

        .user-card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            border: 1px solid #f0f0f0;
            height: 100%;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .user-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
            border-color: var(--color-primary);
        }

        .user-avatar-area {
            position: relative;
            padding-top: 30px;
            text-align: center;
        }

        .user-avatar-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #fff;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .user-role-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 5px 12px;
            border-radius: 30px;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .user-info {
            padding: 20px;
            text-align: center;
            flex-grow: 1;
        }

        .user-actions {
            background: #f9f9f9;
            padding: 15px 20px;
            border-top: 1px solid #eee;
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .search-container {
            background: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.03);
            margin-bottom: 40px;
        }
    </style>

    <div class="row g-5 mb--40">
        <!-- Stats Row -->
        <div class="col-lg-3 col-md-6">
            <div class="rbt-stat-card cursor-pointer" onclick="filterByRole('')" style="cursor: pointer;">
                <div class="icon-box bg-primary-opacity color-primary">
                    <i class="feather-users"></i>
                </div>
                <div>
                    <span class="d-block text-muted small mb-1">إجمالي المستخدمين</span>
                    <h4 class="mb-0">{{ $stats['total'] }}</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="rbt-stat-card cursor-pointer" onclick="filterByRole('student')" style="cursor: pointer;">
                <div class="icon-box bg-secondary-opacity color-secondary">
                    <i class="feather-book-open"></i>
                </div>
                <div>
                    <span class="d-block text-muted small mb-1">الطلاب</span>
                    <h4 class="mb-0">{{ $stats['students'] }}</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="rbt-stat-card cursor-pointer" onclick="filterByRole('teacher')" style="cursor: pointer;">
                <div class="icon-box bg-violet-opacity color-violet">
                    <i class="feather-user-check"></i>
                </div>
                <div>
                    <span class="d-block text-muted small mb-1">المعلمين</span>
                    <h4 class="mb-0">{{ $stats['teachers'] }}</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="rbt-stat-card cursor-pointer" onclick="filterByRole('parent')" style="cursor: pointer;">
                <div class="icon-box bg-coral-opacity color-coral">
                    <i class="feather-heart"></i>
                </div>
                <div>
                    <span class="d-block text-muted small mb-1">أولياء الأمور</span>
                    <h4 class="mb-0">{{ $stats['parents'] }}</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter & Header -->
    <div class="search-container d-flex flex-wrap justify-content-between align-items-center gap-3">
        <div>
            <h4 class="mb-1">دليل المستخدمين</h4>
            <p class="text-muted small mb-0">إدارة جميع الحسابات والصلاحيات.</p>
        </div>
        <div class="d-flex align-items-center gap-3 flex-wrap">
            <form id="filterForm" action="{{ route('admin.users.index') }}" method="GET" class="d-flex gap-2">
                <div class="rbt-search-style-1 no-border bg-gray-light radius-10">
                    <input type="text" name="search" id="searchInput" placeholder="ابحث عن مستخدم..." value="{{ request('search') }}">
                    <button type="submit" class="search-btn"><i class="feather-search"></i></button>
                </div>
                <select name="role" id="roleSelect" class="form-select radius-10 border-0 bg-gray-light" style="width: 150px;">
                    <option value="">كل الأدوار</option>
                    <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>مدير</option>
                    <option value="teacher" {{ request('role') == 'teacher' ? 'selected' : '' }}>معلم</option>
                    <option value="student" {{ request('role') == 'student' ? 'selected' : '' }}>طالب</option>
                    <option value="parent" {{ request('role') == 'parent' ? 'selected' : '' }}>ولي أمر</option>
                </select>
            </form>
            @can('create user')
            <a href="{{ route('admin.users.create') }}" class="rbt-btn btn-gradient btn-sm radius-10 shadow-sm">
                <i class="feather-plus me-1"></i> عضو جديد
            </a>
            @endcan
        </div>
    </div>


    <!-- User Grid -->
    <div class="row g-5">
        @forelse ($users as $user)
            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                <div class="user-card">
                    <!-- Role Badge -->
                    @php
                        $roleName = $user->roles->first()?->name ?? 'user';
                        $badgeClass = match($roleName) {
                            'admin' => 'bg-primary-opacity color-primary',
                            'teacher' => 'bg-violet-opacity color-violet',
                            'student' => 'bg-secondary-opacity color-secondary',
                            'parent' => 'bg-coral-opacity color-coral',
                            default => 'bg-light text-muted'
                        };
                        $roleLabel = match($roleName) {
                            'admin' => 'مدير النظام',
                            'teacher' => 'معلم',
                            'student' => 'طالب',
                            'parent' => 'ولي أمر',
                            default => $roleName
                        };
                    @endphp
                    <span class="user-role-badge {{ $badgeClass }}">
                        {{ $roleLabel }}
                    </span>

                    <div class="user-avatar-area">
                        <img src="{{ asset('uploads/'.$user->profile_image) }}" 
                             class="user-avatar-img" alt="{{ $user->name }}">
                    </div>

                    <div class="user-info">
                        <h5 class="fw-bold mb-1">{{ $user->name }}</h5>
                        <p class="text-muted small mb-3 text-truncate">{{ $user->email }}</p>
                        <div class="d-flex justify-content-center gap-3 text-muted small">
                            <span title="تاريخ الانضمام"><i class="feather-calendar me-1"></i> {{ $user->created_at->format('Y/m/d') }}</span>
                        </div>
                    </div>

                    <div class="user-actions">
                        @can('view user')
                        <a href="{{ route('admin.users.show', $user->id) }}" class="rbt-btn btn-xs bg-primary-opacity radius-round" title="تفاصيل">
                            <i class="feather-eye"></i>
                        </a>
                        @endcan
                        
                        @can('edit user')
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="rbt-btn btn-xs bg-secondary-opacity radius-round" title="تعديل">
                            <i class="feather-edit"></i>
                        </a>
                        @endcan

                        @can('delete user')
                        @if(!$user->hasRole('admin'))
                        <button class="rbt-btn btn-xs bg-color-danger-opacity color-danger radius-round" 
                                onclick="confirmDelete('{{ addslashes($user->name) }}', '{{ route('admin.users.destroy', $user->id) }}')"
                                title="حذف العضو">
                            <i class="feather-trash-2"></i>
                        </button>
                        @endif
                        @endcan
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="text-center py-5 bg-white radius-10 shadow-sm">
                    <i class="feather-users display-1 text-muted opacity-25 mb-3"></i>
                    <h4 class="text-muted">لا يوجد مستخدمين مطابقين للبحث</h4>
                    <p class="text-muted">حاول تغيير خيارات البحث أو الفلتر</p>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Modern Pagination -->
    <div class="mt--40 d-flex justify-content-center">
        {{ $users->withQueryString()->links() }}
    </div>

    <!-- Scripts -->
    <script>
        function filterByRole(role) {
            const roleSelect = document.getElementById('roleSelect');
            if (roleSelect) {
                roleSelect.value = role;
                submitCleanForm();
            }
        }

        const roleSelect = document.getElementById('roleSelect');
        if (roleSelect) {
            roleSelect.addEventListener('change', submitCleanForm);
        }

        const filterForm = document.getElementById('filterForm');
        if (filterForm) {
            filterForm.addEventListener('submit', function(e) {
                e.preventDefault();
                submitCleanForm();
            });
        }

        function submitCleanForm() {
            const form = document.getElementById('filterForm');
            const searchInput = document.getElementById('searchInput');
            const roleSelect = document.getElementById('roleSelect');
            
            const params = new URLSearchParams();
            if (searchInput && searchInput.value.trim() !== '') params.append('search', searchInput.value.trim());
            if (roleSelect && roleSelect.value !== '') params.append('role', roleSelect.value);
            
            window.location.href = form.action + '?' + params.toString();
        }
    </script>
@endsection
