<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required|in:admin, user',
        ], [
            'name.required' => 'Nama Akun Wajib Diisi!',
            'email.required' => 'Email Akun Wajib Diisi!',
            'password.required' => 'Password Wajib Diisi!',
        ]);

        $hashedPassword = Hash::make($request->password);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedPassword,
            'role' => $request->role,
        ]);

        return redirect()->route('user.index')->with('success', 'Akun Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string',
            'email' => 'email',
            'password' => 'min:8',
            'role' => 'in:admin, user',
        ]);

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password'=> bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return redirect()->back();
    }
}
