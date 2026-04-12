@extends('layout.layout')

@php
$header='false';
$footer='false';
$topToBottom='false';
$bodyClass='';
@endphp

@section('content')
<x-background />

<!-- Start Dashboard Area -->
<div class="rbt-dashboard-area rbt-section-overlayping-top rbt-section-gapBottom">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3">
                <div class="rbt-default-sidebar sticky-top rbt-shadow-box rbt-gradient-border">
                    <div class="inner">
                        <div class="content-item-content">
                            <div class="rbt-default-sidebar-wrapper">
                                <div class="section-title mb--20">
                                    <h6 class="rbt-title-style-2">Welcome, {{ Auth::user()->name }}</h6>
                                </div>
                                <nav class="mainmenu-nav">
                                    <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                                        <li>
                                            <a href="{{ route('adminDashboard') }}">
                                                <i class="feather-home"></i><span>Dashboard</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.users.index') }}">
                                                <i class="feather-user"></i><span>Users</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>

                                <div class="section-title mt--40 mb--20">
                                    <h6 class="rbt-title-style-2">User</h6>
                                </div>
                                <nav class="mainmenu-nav">
                                    <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                                        <li>
                                            <a href="#"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="feather-log-out text-danger"></i>
                                                <span class="text-danger">Log Out</span>
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display:none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Sidebar -->

            <!-- Main Content -->
            <div class="col-lg-9">
                <div class="rbt-dashboard-content bg-color-white rbt-shadow-box mb--60">
                    <div class="content">
                        <div class="row mb--20 align-items-center">
                            <div class="col-lg-3">
                                <h4 class="rbt-title-style-3">Users Management</h4>
                            </div>
                           
                            <div class="col-lg-9 text-end">
                                    <a href="{{ route('admin.users.create.teacher') }}" class="rbt-btn btn-gradient rbt-sm me-1">
                                        <i class="feather-plus"></i> Add Teacher
                                    </a>
                            </div>
                        </div>

                        <div class="rbt-dashboard-table table-responsive">
                            <table class="rbt-table table table-borderless">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th style="width:140px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td><a href="#" class="text-primary fw-bold">{{ $user->name }}</a></td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @foreach($user->roles as $role)
                                            <span class="badge bg-primary-opacity text-primary">{{ ucfirst($role->name)
                                                }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                                class="btn btn-sm btn-outline-primary me-1">
                                                <i class="feather-edit"></i>
                                            </a>

                                            <form action="{{ route('admin.users.delete', $user->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Delete user?')">
                                                    <i class="feather-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Main Content -->
        </div>
    </div>
</div>
<!-- End Dashboard Area -->

<x-separator />

@endsection