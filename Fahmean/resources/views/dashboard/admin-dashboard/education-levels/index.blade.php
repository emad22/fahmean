@extends('layout.dashboard')
    
@php
    $header = 'false';
    $footer = 'false';
    $topToBottom = 'false';
    $bodyClass = '';
@endphp

@section('dashboard-content')
    <style>
        .premium-level-card {
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

        .premium-level-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.05);
            border-color: var(--color-primary);
        }

        .level-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            background: rgba(var(--color-primary-rgb), 0.1);
            color: var(--color-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .premium-level-card:hover .level-icon {
            background: var(--color-primary);
            color: #fff;
            transform: scale(1.1) rotate(5deg);
        }

        .level-title {
            font-size: 1.25rem;
            font-weight: 800;
            color: #1a1a1a;
            margin-bottom: 10px;
        }

        .level-meta {
            font-size: 0.85rem;
            color: #777;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .action-buttons {
            margin-top: 25px;
            border-top: 1px solid #f5f5f5;
            padding-top: 20px;
            display: flex;
            gap: 10px;
        }
    </style>

    <!-- Header Section -->
    <div class="row align-items-center mb--40 g-4">
        <div class="col-lg-6">
            <h2 class="mb-0 fw-bold">المراحل التعليمية</h2>
            <p class="text-muted mb-0">إدارة وتنظيم المراحل الدراسية (ابتدائي - إعدادي - ثانوي)</p>
        </div>
        <div class="col-lg-6 text-end">
            <a href="{{ route('admin.education-levels.create') }}" class="rbt-btn btn-gradient btn-md radius-10 shadow-sm">
                <i class="feather-plus-circle me-1"></i> إضافة مرحلة جديدة
            </a>
        </div>
    </div>

    <!-- Levels Grid -->
    <div class="row g-5">
        @forelse ($levels as $level)
            <div class="col-xl-4 col-md-6 col-sm-12">
                <div class="premium-level-card">
                    <div>
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="level-icon">
                                <i class="feather-layers"></i>
                            </div>
                            <span class="badge bg-secondary-opacity text-secondary radius-round px-3 py-2">
                                #{{ $loop->iteration }}
                            </span>
                        </div>
                        
                        <h4 class="level-title">{{ $level->name }}</h4>
                        <div class="level-meta mb-3">
                            <i class="feather-calendar"></i> تم الإضافة: {{ $level->created_at->format('Y-m-d') }}
                        </div>
                        
                        {{-- Optional: Show count of grades if available --}}
                         @if($level->grades_count ?? false)
                        <div class="level-meta text-primary">
                            <i class="feather-list"></i> {{ $level->grades_count }} صفوف دراسية
                        </div>
                        @endif
                    </div>

                    <div class="action-buttons">
                        <a href="{{ route('admin.education-levels.edit', $level->id) }}" class="rbt-btn btn-sm bg-primary-opacity w-100 radius-10 text-center" title="تعديل">
                            <i class="feather-edit"></i> تعديل
                        </a>
                        <button class="rbt-btn btn-sm bg-color-danger-opacity color-danger w-100 radius-10 text-center" 
                                onclick="confirmDelete('{{ $level->name }}', '{{ route('admin.education-levels.destroy', $level->id) }}')"
                                title="حذف">
                            <i class="feather-trash-2"></i> حذف
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <div class="p-5 bg-white radius-20 shadow-sm border">
                    <i class="feather-layers display-3 text-muted opacity-25 mb-3 d-block"></i>
                    <h5 class="text-muted">لا توجد مراحل تعليمية مضافة حالياً</h5>
                    <p class="text-muted mb-4">ابدأ بإضافة المراحل الدراسية لتهيئة النظام.</p>
                    <a href="{{ route('admin.education-levels.create') }}" class="rbt-btn btn-gradient btn-sm">إضافة مرحلة</a>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Custom Modern Delete Confirm Logic -->
    <script>
        function confirmDelete(itemName, actionUrl) {
            Swal.fire({
                title: 'هل أنت متأكد؟',
                text: "سيتم حذف المرحلة '" + itemName + "' وجميع الصفوف المرتبطة بها!",
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
