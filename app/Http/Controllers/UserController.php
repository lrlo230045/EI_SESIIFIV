<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // LISTAR
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // FORM CREATE
    public function create()
    {
        return view('users.create');
    }

    // GUARDAR
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'active' => $request->active ? true : false
        ]);

        return redirect()->route('users.index')->with('success','Usuario creado');
    }

    // EDITAR
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // ACTUALIZAR
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'active' => $request->active ? true : false
        ]);

        return redirect()->route('users.index')->with('success','Usuario actualizado');
    }

    // ELIMINAR
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return back()->with('success','Usuario eliminado');
    }
}