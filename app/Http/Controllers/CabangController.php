<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use App\Models\User;
use Illuminate\Http\Request;

class CabangController extends Controller
{
    public function index()
    {
        $data['cabang_toko'] = Cabang::with('users')->get();
        return view('admin/cabang.index', $data);
    }

    public function create()
    {
        $managers = User::where('role', 'manager')->get(); 
        return view('admin/cabang.create', compact('managers'));
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        
        Cabang::create($validatedData);

        $notification = array(
            'message' => 'Pengguna berhasil ditambahkan',
            'alert-type' => 'success'
        );
        return redirect()->route('cabang.index')->with($notification);
    }
}
