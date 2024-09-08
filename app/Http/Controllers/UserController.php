<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list()
    {
        $users = User::all();
        return view('admin.list-user', compact('users'));
    }
    public function create()
    {
        $roles = Role::all();
        return view('admin.create-user', compact('roles'));
    }
    public function register()
    {
        return view('register');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:tbl_users',
            'phone' => 'required|numeric',
            'id_role' => 'numeric|exists:tbl_roles,id_role',
            'password' => 'required|min:8|confirmed',
        ]);
        $validated['id_role'] = $validated['id_role'] ?? 3;
        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.edit-user', compact('user', 'roles'));
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:tbl_users,email,' . $id . ',id_user',
            'phone' => 'required|numeric',
            'id_role' => 'required|numeric|exists:tbl_roles,id_role',
        ]);
        User::where('id_user', $id)->update($validated);
        return redirect()->back()->with('success', 'Data berhasil diubah');
    }
    public function delete($id)
    {
        User::where('id_user', $id)->delete();
        return redirect()->route('user.list')->with('success', 'Data berhasil dihapus');
    }
}
