<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller implements HasMiddleware
{

    public static function middleware() : array
    {
        return [ 
            'auth', 
            new Middleware('can:Listar role', only: ['index']),
            new Middleware('can:Crear role', only: ['create','store']),
            new Middleware('can:Editar role', only: ['edit','update']),
            new Middleware('can:Eliminar role', only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        $role = $perm = [];
        return view('admin.roles.create', compact('permissions', 'role', 'perm'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'permissions' => 'required'
        ]);

        $role = Role::create([
            'name' => $request->name
        ]);
        $role->permissions()->attach($request->permissions);

        return redirect()->route('admin.roles.index')->with('info', 'El rol se creo satisfactoriamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $perm = $role->permissions()->pluck('permission_id')->toArray();
        return view('admin.roles.edit', compact('role', 'permissions', 'perm'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required',
            'permissions' => 'required'
        ]);
        $role->update([ 'name' => $request->name ]);
        $role->permissions()->sync($request->permissions);
        return redirect()->route('admin.roles.edit', $role);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')
            ->with('info', 'El rol eliminado satisfactoriamente');
    }
}
