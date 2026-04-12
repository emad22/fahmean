<div class="rbt-default-sidebar sticky-top rbt-shadow-box rbt-gradient-border">
    <div class="inner">
        <div class="content-item-content">

            <div class="rbt-default-sidebar-wrapper">
                <div class="section-title mb--20">
                    <h6 class="rbt-title-style-2">مرحباً, {{ Auth::user()->name }}</h6>
                </div>
                <nav class="mainmenu-nav">
                    <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                        <li>
                            <a href="{{ route('dashboard.index') }}">
                                <i class="feather-home"></i><span>الصفحة الرئيسية</span>
                            </a>
                        </li>
                        
                        @can('view user')
                        <li>
                            <a href="{{ route('admin.users.index') }}">
                                <i class="feather-user"></i><span>المستخدمين</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </nav>

                @if(auth()->user()->can('manage_education_levels') || auth()->user()->can('manage_grades') || auth()->user()->can('manage_subjects') || auth()->user()->can('view course') || auth()->user()->can('view lesson') || auth()->user()->can('view quiz'))
                <div class="section-title mt--40 mb--20">
                    <h6 class="rbt-title-style-2">الإعدادات التعليمية</h6>
                </div>
                
                <nav class="mainmenu-nav">
                    <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                        @can('manage_education_levels')
                        <li>
                            <a href="{{ route('admin.education-levels.index') }}">
                                <i class="feather-layers"></i>
                                <span>المراحل التعليمية</span>
                            </a>
                        </li>
                        @endcan

                        @can('manage_grades')
                        <li>
                            <a href="{{ route('admin.grades.index') }}">
                                <i class="feather-list"></i>
                                <span> الصفوف التعليمية</span>
                            </a>
                        </li>
                        @endcan

                        @can('manage_subjects')
                        <li>
                            <a href="{{ route('admin.subjects.index') }}">
                                <i class="feather-volume-2"></i>
                                <span> المواد الدراسية </span>
                            </a>
                        </li>
                        @endcan
                
                        @can('view course')
                        <li>
                            <a href="{{ route('courses.index') }}">
                                <i class="feather-book"></i>
                                <span>الكورسات</span>
                            </a>
                        </li>
                        @endcan

                        @can('view lesson')
                        <li>
                            <a href="{{ route('lessons.index') }}">
                                <i class="feather-video"></i>
                                <span>الدروس</span>
                            </a>
                        </li>
                        @endcan

                        @can('view quiz')
                        <li>
                            <a href="{{ route('quizzes.index') }}">
                                <i class="feather-clipboard"></i>
                                <span>الاختبارات</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </nav>
                @endif

                @if(auth()->user()->can('view role') || auth()->user()->can('manage_roles_permissions'))
                <div class="section-title mt--40 mb--20">
                    <h6 class="rbt-title-style-2">إدارة النظام</h6>
                </div>
                
                <nav class="mainmenu-nav">
                    <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                        @can('view role')
                        <li>
                            <a href="{{ route('admin.roles.index') }}">
                                <i class="feather-shield"></i>
                                <span>الأدوار</span>
                            </a>
                        </li>
                        @endcan
                
                        @can('manage_roles_permissions')
                        <li>
                            <a href="{{ route('admin.permissions.index') }}">
                                <i class="feather-lock"></i>
                                <span>الصلاحيات</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </nav>
                @endif

               

                @role('student')
                <div class="section-title mt--40 mb--20">
                    <h6 class="rbt-title-style-2">منطقتي التعليمية</h6>
                </div>
                
                <nav class="mainmenu-nav">
                    <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                        <li>
                            <a href="{{ route('courses.index') }}">
                                <i class="feather-book-open"></i>
                                <span>كورساتي</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('student.my-quizzes') }}">
                                <i class="feather-check-square"></i>
                                <span>اختباراتي</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('student.order-history') }}">
                                <i class="feather-shopping-bag"></i>
                                <span>سجل الطلبات</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                @endrole
				
				<nav class="mainmenu-nav">
                    <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                        
                        <li>
                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="feather-log-out text-danger"></i>
                                <span class="text-danger">تسجيل الخروج</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </nav>
            </div>

        </div>
    </div>
</div>
