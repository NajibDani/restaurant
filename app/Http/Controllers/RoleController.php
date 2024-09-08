<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function list(){
        $roles = Role::all();
        return view('roles.list-role', compact('roles'));
    }
    public function create(){
        return view('roles.create-role');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'role_name' => 'required|string|unique:tbl_roles',
        ]);
        Role::create($validated);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
}
