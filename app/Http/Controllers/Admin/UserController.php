<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Models\Role;

class UserController extends Controller implements HasMiddleware
{

    public static function middleware() : array
    {
        return [ 
            'auth', 
            new Middleware('can:Leer usuarios', only: ['index']),
            new Middleware('can:Editar usuarios', only: ['edit','update'])
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $user_role = $user->roles()->pluck('role_id')->toArray();
        return view('admin.users.edit', compact('user', 'roles', 'user_role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {   
        $user->roles()->sync($request->roles);
        return redirect()->route('admin.users.edit', $user);
    }

}
