<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Permission\StorePermissionRequest;
use App\Http\Requests\Permission\UpdatePermissionRequest;

class PermissionController extends Controller
{
    public function index(Permission $permission) {
        $this->authorize('list_permission', $permission);

        $permissions = Permission::all();
        return view('admin.permission.list', compact('permissions'));
    }

    public function create(Permission $permission) {
        $this->authorize('add_permission', $permission);

        return view('admin.permission.create');
    }

    public function store(StorePermissionRequest $request)
    {
        $permission = Permission::create([
            'name' => trim($request->name),
            'display_name' => trim($request->display_name),
            'key_code' => trim($request->key_code),
        ]);

        return redirect()->route('permission.list');
    }

    public function edit($id, Permission $permission) {
        $this->authorize('edit_permission', $permission);

        $permission = Permission::find($id);
        return view('admin.permission.edit', compact('permission'));
    }

    public function update(UpdatePermissionRequest $request, $id) {
        $permission = Permission::find($id);
        $permission->update([
            'name' => trim($request->name),
            'display_name' => trim($request->display_name),
            'key_code' => trim($request->key_code),
        ]);
        return redirect()->route('permission.list');
    }

    public function destroy($id, Permission $permission) {
        $this->authorize('delete_permission', $permission);

        $permission = Permission::find($id);
        if ($permission) {
            $permission->delete();
            return redirect()->route('permission.list');
        }
    }
}
