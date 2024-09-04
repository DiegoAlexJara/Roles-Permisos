<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();
        return view('roles.index', compact('roles'));
    }
    public function create()
    {
        $permisos = Permission::all();
        return view('roles.create', compact('permisos'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'required|array',
        ]);
        // return $permisosName;

        $role = Role::create(['name' => $request->name]);
       

        if($request->has('permissions')){
            $permissionNames = Permission::whereIn('id', $request->permissions)->pluck('name')->toArray();
            $role->syncPermissions($permissionNames);
        }

        return redirect()->route('Roles.index')->with('success', 'SE HA CREADO EL ROL');
    }
    public function destroy($roles)
    {
        $roles = Role::find($roles);
        $roles->delete();
        return redirect()->route('Roles.index')->with('success', 'ROL ELIMINADO');
    }
}
