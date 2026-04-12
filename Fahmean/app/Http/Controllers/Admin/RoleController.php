<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class RoleController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view role', only: ['index']),
            new Middleware('permission:create role', only: ['create', 'store']),
            new Middleware('permission:edit role', only: ['edit', 'update']),
            new Middleware('permission:delete role', only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.admin-dashboard.roles.index', [
            'roles' => Role::with('permissions')->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.admin-dashboard.roles.create', [
            'permissions' => Permission::all()
        ]);
    }

    public function store(Request $request)
    {
        $role = Role::create([
            'name' => $request->name
        ]);

        // تحويل IDs إلى أسماء
        $permissions = Permission::whereIn('id', $request->permissions)->pluck('name')->toArray();

        $role->syncPermissions($permissions);

        return redirect()->route('admin.roles.index')->with('success', 'تم إنشاء الدور بنجاح');
    }

    public function edit(Role $role)
    {
        return view('dashboard.admin-dashboard.roles.edit', [
            'role' => $role,
            'permissions' => Permission::all()
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $role->update(['name' => $request->name]);
        
        // تحويل IDs إلى أسماء لتجنب خطأ PermissionDoesNotExist
        $permissions = Permission::whereIn('id', $request->permissions ?? [])->pluck('name')->toArray();
        $role->syncPermissions($permissions);

        return redirect()->route('admin.roles.index')->with('success', 'تم التحديث بنجاح');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('success', 'Deleted');
    }
}
