<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public function index()
    {
        return view('dashboard.admin-dashboard.permissions.index', [
            'permissions' => Permission::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.admin-dashboard.permissions.create');
    }

    public function store(Request $request)
    {
        Permission::create(['name' => $request->name]);
        return redirect()->route('admin.permissions.index')->with('success', 'Permission created');
    }

    public function edit(Permission $permission)
    {
        return view('dashboard.admin-dashboard.permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $permission->update(['name' => $request->name]);
        return redirect()->route('admin.permissions.index')->with('success', 'Updated');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('admin.permissions.index')->with('success', 'Deleted');
    }
}
