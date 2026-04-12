@extends('layout.dashboard')
 
 @php
     $header = 'false';
     $footer = 'false';
     $topToBottom = 'false';
     $bodyClass = '';
 @endphp
 
 @section('dashboard-content')
    <div class="row align-items-center mb--30">
        <div class="col-lg-8">
             <h3 class="fw-bold mb-1">إدارة الأدوار والصلاحيات</h3>
             <p class="text-muted mb-0">تحكم في مستويات الوصول للمستخدمين وتخصيص الصلاحيات.</p>
        </div>
        <div class="col-lg-4 text-end">
            @can('create role')
             <a href="{{ route('admin.roles.create') }}" class="rbt-btn btn-gradient btn-md radius-10 shadow-sm hover-transform-none">
                 <i class="feather-plus-circle me-2"></i> إضافة دور جديد
             </a>
             @endcan
        </div>
    </div>
 
    <div class="row g-5">
        @forelse ($roles as $role)
            <div class="col-lg-4 col-md-6 col-12">
                <div class="rbt-card variation-01 rbt-hover card-role radius-10 shadow-sm border-0" style="transition: 0.3s; height: 100%;">
                    <div class="rbt-card-body p-4 d-flex flex-column h-100">
                        
                        <div class="d-flex justify-content-between align-items-start mb-4">
                            <div class="icon-box bg-primary-opacity color-primary radius-round" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                <i class="feather-shield h4 mb-0"></i>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light radius-round" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="feather-more-vertical"></i>
                                </button>
                                <ul class="dropdown-menu text-end border-0 shadow-lg radius-10 p-2">
                                     @can('edit role')
                                    <li><a class="dropdown-item radius-5" href="{{ route('admin.roles.edit', $role->id) }}"><i class="feather-edit me-2 text-warning"></i> تعديل</a></li>
                                    @endcan
                                    @can('delete role')
                                    <li>
                                        <a class="dropdown-item radius-5 text-danger" href="#" 
                                           onclick="confirmDelete('{{ addslashes($role->name) }}', '{{ route('admin.roles.destroy', $role->id) }}')">
                                            <i class="feather-trash-2 me-2"></i> حذف
                                        </a>
                                    </li>
                                    @endcan
                                </ul>
                            </div>
                        </div>

                        <h4 class="rbt-card-title h5 fw-bold mb-3">{{ $role->name }}</h4>
                        
                        <div class="rbt-card-text mb-4 flex-grow-1">
                            <div class="d-flex align-items-center mb-2">
                                <span class="badge {{ $role->name == 'admin' ? 'bg-danger-opacity color-danger' : 'bg-secondary-opacity color-secondary' }} radius-pill px-3 py-2">
                                    {{ $role->permissions->count() }} صلاحية مفعلة
                                </span>
                            </div>
                            <p class="text-muted small mb-0">
                                @if($role->permissions->count() > 0)
                                    تتضمن: {{ $role->permissions->take(3)->pluck('name')->implode('، ') }}
                                    @if($role->permissions->count() > 3)
                                        و {{ $role->permissions->count() - 3 }} آخرين...
                                    @endif
                                @else
                                    لا توجد صلاحيات مسندة لهذا الدور.
                                @endif
                            </p>
                        </div>

                        <div class="rbt-card-bottom mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                            <span class="text-muted small"><i class="feather-clock me-1"></i> {{ $role->created_at->format('Y/m/d') }}</span>
                            @can('edit role')
                            <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-sm btn-light radius-10 text-muted hover-primary">
                                إدارة الصلاحيات <i class="feather-arrow-left ms-1"></i>
                            </a>
                            @endcan
                        </div>

                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="text-center py-5 bg-white radius-10 shadow-sm">
                    <div class="mb-4">
                        <i class="feather-shield display-1 text-muted opacity-25"></i>
                    </div>
                    <h4 class="text-muted mb-3">لا توجد أدوار مضافة حتى الآن</h4>
                    @can('create role')
                    <a href="{{ route('admin.roles.create') }}" class="rbt-btn btn-gradient btn-md radius-10">
                        <i class="feather-plus me-2"></i> ابدأ بإضافة دور
                    </a>
                    @endcan
                </div>
            </div>
        @endforelse
    </div>
 @endsection