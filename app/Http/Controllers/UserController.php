<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user= User::all();
        return view('admin/pengguna.index', compact('user'));
    }

    public function create(){
        return view('admin/pengguna.create');
    }

    public function store(Request $request)
    {
    
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|string|max:50',
        ]);


        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']), 
            'role' => $validatedData['role'],
        ]);

    
        $notification = array(
            'message' => 'Pengguna berhasil ditambahkan',
            'alert-type' => 'success'
        );
        return redirect()->route('admin/pengguna.index')->with($notification);
    }
}
