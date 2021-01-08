<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    // List Role [GET]
    public function index(Role $role) {
        $this->authorize('list_role', $role);

        $roles = Role::all();
        return view('admin.role.list', compact('roles'));
    }

    // Create Role [GET]
    public function create(Role $role) {

        // check permission
        $this->authorize('add_role', $role);

        $permissions = Permission::all();
        return view('admin.role.create', compact('permissions'));
    }

    // Store Role [POST]
    public function store(Request $request) {

        $role = Role::create([
            'name'=> $request->name,
            'display_name'=> $request->display_name,
        ]);
        $role->permissions()->attach($request->permission_id);
        return redirect()->route('role.list');
    }

    // Edit Role [GET]
    public function edit($id, Role $role) {
        $this->authorize('edit_role', $role);

        $role = Role::find($id);
        $permissions = Permission::all();
        $pemissionsChecked = $role->permissions;
        return view('admin.role.edit', compact('role','permissions', 'pemissionsChecked'));
    }

    // Update Role [POST]
    public function update(Request $request, $id) {

        $role = Role::find($id);
        $role->update([
            'name'=> $request->name,
            'display_name'=> $request->display_name,
        ]);
        $role->permissions()->sync($request->permission_id);
        return redirect()->route('role.list');
    }

    // Delete Role [GET]
    function destroy($id, Role $role) {
        $this->authorize('delete_role', $role);

        $role = Role::find($id);
        if ($role) {
            $role->delete();
            return redirect()->route('role.list');
        }
    }
}
