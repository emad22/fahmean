@extends('layout.dashboard')
 
 @php
     $header = 'false';
     $footer = 'false';
     $topToBottom = 'false';
     $bodyClass = '';
 @endphp
 
 @section('dashboard-content')
     <div class="rbt-dashboard-content bg-color-white rbt-shadow-box mb--60">
         <div class="content">
 
             <div class="section-title d-flex justify-content-between align-items-center mb--30">
                 <h4 class="rbt-title-style-3 mb-0">🔐 إدارة الصلاحيات</h4>
                 <a href="{{ route('admin.permissions.create') }}" class="rbt-btn btn-sm btn-gradient hover-transform-none">
                     <span class="icon-reverse-wrapper">
                         <span class="btn-text">إضافة صلاحية</span>
                         <span class="btn-icon"><i class="feather-plus"></i></span>
                         <span class="btn-icon"><i class="feather-plus"></i></span>
                     </span>
                 </a>
             </div>
 
             @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show rbt-alert-success" role="alert">
                    <i class="feather-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
             @endif
 
             <div class="rbt-dashboard-table table-responsive mt--20">
                 <table class="rbt-table table table-hover">
                     <thead class="bg-light">
                         <tr>
                             <th class="w-10">#</th>
                             <th>اسم الصلاحية</th>
                             <th>تاريخ الإنشاء</th>
                             <th class="text-center">الإجراءات</th>
                         </tr>
                     </thead>
                     <tbody>
                         @forelse ($permissions as $permission)
                             <tr>
                                 <td><span class="fw-bold text-muted">{{ $loop->iteration }}</span></td>
                                 <td>
                                     <span class="badge bg-primary-opacity fs-6">{{ $permission->name }}</span>
                                 </td>
                                 <td class="text-muted text-sm">{{ $permission->created_at->format('Y-m-d') }}</td>
                                 <td>
                                     <div class="rbt-button-group justify-content-center">
                                         <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="rbt-btn btn-xs bg-primary-opacity radius-round" title="تعديل">
                                             <i class="feather-edit"></i>
                                         </a>
                                         <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" class="d-inline-block">
                                             @csrf
                                             @method('DELETE')
                                             <button class="rbt-btn btn-xs bg-danger-opacity radius-round color-danger" onclick="return confirm('حذف الصلاحية قد يؤثر على وظائف النظام! هل أنت متأكد؟')" title="حذف">
                                                 <i class="feather-trash-2"></i>
                                             </button>
                                         </form>
                                     </div>
                                 </td>
                             </tr>
                         @empty
                             <tr>
                                 <td colspan="4" class="text-center py-5">
                                     <div class="d-flex flex-column align-items-center">
                                         <i class="feather-lock display-3 text-muted opacity-25 mb-3"></i>
                                         <h5 class="text-muted mb-2">لا توجد صلاحيات</h5>
                                         <a href="{{ route('admin.permissions.create') }}" class="rbt-btn btn-sm btn-gradient">إضافة صلاحية</a>
                                     </div>
                                 </td>
                             </tr>
                         @endforelse
                     </tbody>
                 </table>
             </div>
 
         </div>
     </div>
 @endsection