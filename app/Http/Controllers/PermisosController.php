<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisosController extends Controller
{
    public function index()
    {   

        $permisos = Permission::with('roles')->get();
        return view('permisos.index', compact('permisos'));
    }
    public function create()
    {
        $roles = Role::all();
        return view('permisos.create', compact('roles'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
            'roles' => 'array',
        ]);
        $permisos = Permission::create(['name' => $request->name]);
        if($request->has('roles'))
        {
            $rolesNames = Role::whereIn('id', $request->roles)->pluck('name')->toArray();
            $permisos->syncRoles($rolesNames);
        }
        return redirect()->route('Permisos.index')->with('success', 'PERMISO CREADO');
    }
}
