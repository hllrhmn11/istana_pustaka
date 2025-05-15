<?php

// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('backend.user.index', compact('users'));
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('backend.user.show', compact('user'));
    }
        public function create()
    {
        $ar_role = ['Admin','Staff','User'];
        return view('backend.user.create', compact('ar_role')); // Pastikan view ini ada
    }
    public function store(Request $request) {
        $request->validate([
            'name' => 'required', 'email' => 'required|email|unique:users',
            'password' => 'required|min:6', 'no_wa' => 'required'
        ]);

        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'no_wa' => $request->no_wa,
                'password' => Hash::make($request->password),
                'role' => 'pembeli'
            ]);
            return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menambahkan user: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.user.edit', compact('user'));
    }
    
   public function update(Request $request, $id)
   {
       $request->validate([
           'name' => 'required',
           'email' => 'required|email|unique:users,email,' . $id,
           'no_wa' => 'required',
           'role' => 'required'
       ]);
   
       try {
           $user = User::findOrFail($id);
           $user->name = $request->name;
           $user->email = $request->email;
           $user->no_wa = $request->no_wa;
           $user->role = $request->role;
   
           if ($request->filled('password')) {
               $user->password = Hash::make($request->password);
           }
   
           $user->save();
   
           return redirect()->route('users.index')->with('success', 'User berhasil diperbarui');
       } catch (\Exception $e) {
           return back()->with('error', 'Gagal memperbarui user: ' . $e->getMessage());
       }
    }


    public function destroy($id) {
        try {
            User::findOrFail($id)->delete();
            return back()->with('success', 'User berhasil dihapus');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus user: ' . $e->getMessage());
        }
    }
}


