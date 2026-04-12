@extends('layout.dashboard')
    
@php
    $header = 'false';
    $footer = 'false';
    $topToBottom = 'false';
    $bodyClass = '';
@endphp

@section('dashboard-content')
    <style>
        .premium-grade-card {
            background: #fff;
            border-radius: 20px;
            padding: 30px;
            transition: all 0.3s ease;
            border: 1px solid #f0f0f0;
            position: relative;
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .premium-grade-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.05);
            border-color: var(--color-primary);
        }

        .grade-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background: rgba(var(--color-secondary-rgb), 0.1);
            color: var(--color-secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        
        .premium-grade-card:hover .grade-icon {
             background: var(--color-secondary);
             color: #fff;
             transform: scale(1.1);
        }

        .grade-title {
            font-size: 1.2rem;
            font-weight: 800;
            color: #1a1a1a;
            margin-bottom: 5px;
        }

        .level-badge {
            display: inline-block;
            background: #f4f6fc;
            color: #6b7385;
            padding: 4px 12px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .action-buttons {
            margin-top: 20px;
            border-top: 1px solid #f5f5f5;
            padding-top: 15px;
            display: flex;
            gap: 10px;
        }
    </style>

    <!-- Header Section -->
    <div class="row align-items-center mb--40 g-4">
        <div class="col-lg-6">
            <h2 class="mb-0 fw-bold">إدارة الصفوف الدراسية</h2>
            <p class="text-muted mb-0">تنظيم الصفوف الملحقة بكل مرحلة تعليمية.</p>
        </div>
        <div class="col-lg-6 text-end">
            <a href="{{ route('admin.grades.create') }}" class="rbt-btn btn-gradient btn-md radius-10 shadow-sm">
                <i class="feather-plus-circle me-1"></i> إضافة صف جديد
            </a>
        </div>
    </div>

    <!-- Grades Grid -->
    <div class="row g-5">
        @forelse ($grades as $grade)
            <div class="col-xl-4 col-md-6 col-sm-12">
                <div class="premium-grade-card">
                    <div>
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="grade-icon">
                                <i class="feather-list"></i>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-sm p-0 border-0 bg-transparent text-muted" data-bs-toggle="dropdown">
                                    <i class="feather-more-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow-md border-0 radius-10">
                                    <li><a class="dropdown-item small" href="{{ route('admin.grades.edit', $grade->id) }}"><i class="feather-edit me-2"></i> تعديل</a></li>
                                </ul>
                            </div>
                        </div>
                        
                        <h4 class="grade-title">{{ $grade->name }}</h4>
                        <span class="level-badge">
                            <i class="feather-layers me-1 small"></i>{{ $grade->level->name ?? 'غير محدد' }}
                        </span>
                        
                        <div class="text-muted small mt-2">
                             <i class="feather-calendar me-1"></i> {{ $grade->created_at->format('Y-m-d') }}
                        </div>
                    </div>

                    <div class="action-buttons">
                        <a href="{{ route('admin.grades.edit', $grade->id) }}" class="rbt-btn btn-sm bg-primary-opacity w-100 radius-10 text-center" title="تعديل">
                            <i class="feather-edit"></i> تعديل
                        </a>
                        <button class="rbt-btn btn-sm bg-color-danger-opacity color-danger w-100 radius-10 text-center" 
                                onclick="confirmDelete('{{ $grade->name }}', '{{ route('admin.grades.destroy', $grade->id) }}')"
                                title="حذف">
                            <i class="feather-trash-2"></i> حذف
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <div class="p-5 bg-white radius-20 shadow-sm border">
                    <i class="feather-list display-3 text-muted opacity-25 mb-3 d-block"></i>
                    <h5 class="text-muted">لا توجد صفوف دراسية مضافة حالياً</h5>
                    <a href="{{ route('admin.grades.create') }}" class="rbt-btn btn-gradient btn-sm mt-3">إضافة صف جديد</a>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt--40 d-flex justify-content-center">
        {{ $grades->links() }}
    </div>

    <!-- Custom Modern Delete Confirm Logic -->
    <script>
        function confirmDelete(itemName, actionUrl) {
            Swal.fire({
                title: 'هل أنت متأكد؟',
                text: "سيتم حذف الصف '" + itemName + "' وجميع المواد المرتبطة به!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'نعم، حذف نهائي',
                cancelButtonText: 'تراجع',
                customClass: {
                    popup: 'radius-15'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    let form = document.createElement('form');
                    form.action = actionUrl;
                    form.method = 'POST';
                    form.innerHTML = '@csrf @method("DELETE")';
                    document.body.appendChild(form);
                    form.submit();
                }
            })
        }
    </script>
@endsection