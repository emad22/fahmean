<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 1. Create Permissions
        $permissions = [
            // Dashboard access
            'access_admin_dashboard',
            'access_teacher_dashboard',
            'access_student_dashboard',

            // User Management
            'view user',
            'create user',
            'edit user',
            'delete user',

            // Role Management
            'view role',
            'create role',
            'edit role',
            'delete role',

            // Content Management
            'view course',
            'create course',
            'edit course',
            'delete course',
            
            'view lesson',
            'create lesson',
            'edit lesson',
            'delete lesson',
            
            'view quiz',
            'create quiz',
            'edit quiz',
            'delete quiz',

            'enroll_students',

            // Student Specific
            'view_student_courses',
            'view_student_wishlist',
            'view_student_reviews',
            'view_student_attempts',
            'view_student_orders',
            
            // Legacy/Broad permissions (kept for backward compatibility if needed, or can be removed)
            'manage_education_levels', // Can be broken down later
            'manage_grades',
            'manage_subjects',
        ];

        foreach ($permissions as $permission) {
            Permission::findOrCreate($permission);
        }

        // 2. Create Roles and Assign Permissions

        // Admin
        $adminRole = Role::findOrCreate('admin');
        $adminRole->givePermissionTo(Permission::all());

        // Teacher
        $teacherRole = Role::findOrCreate('teacher');
        $teacherRole->givePermissionTo([
            'access_teacher_dashboard',
            'view course', 'create course', 'edit course', 'delete course',
            'view lesson', 'create lesson', 'edit lesson', 'delete lesson',
            'view quiz', 'create quiz', 'edit quiz', 'delete quiz',
            'enroll_students',
        ]);

        // Assistant Teacher
        $assistantRole = Role::findOrCreate('assistant_teacher');
        $assistantRole->givePermissionTo([
            'access_teacher_dashboard',
            'view course', 'create course', 'edit course', 'delete course', // Maybe limit delete? but keeping faithful to original 'manage'
            'view lesson', 'create lesson', 'edit lesson', 'delete lesson',
            'view quiz', 'create quiz', 'edit quiz', 'delete quiz',
        ]);

        // Student
        $studentRole = Role::findOrCreate('student');
        $studentRole->givePermissionTo([
            'access_student_dashboard',
            'view_student_courses',
            'view_student_wishlist',
            'view_student_reviews',
            'view_student_attempts',
            'view_student_orders',
        ]);

        // Parent
        $parentRole = Role::findOrCreate('parent');
        $parentRole->givePermissionTo([
            'access_student_dashboard', // They see a dashboard similar to students but for their kids
        ]);

        // 3. Assign Roles to existing Users
        // Create a default admin if none exists for convenience
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'),
            ]
        );
        $adminUser->assignRole('admin');

        // Optional: Assign roles to other users for testing if they exist
        $users = User::all();
        foreach ($users as $user) {
            if ($user->email === 'admin@admin.com') continue;
            // You can add more logic here if needed
        }
    }
}
