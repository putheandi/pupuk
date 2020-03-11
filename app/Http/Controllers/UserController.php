<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user = User::all();
        return view('user.index', compact('user'));
    }

    public function create(){
        $user = new User();
        return view('user.create', compact('user'));
    }

    public function store(){
        $data = request()->validate([
            'nama' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
        ], [
            'nama.required' => 'Nama Tidak Boleh Kosong',
            'username.required' => 'username Tidak Boleh Kosong',
            'password.required' => 'password Tidak Boleh Kosong',
        ]);
//        dd($data);

        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect('user')->with('success', 'User Berhasil di Tambah');
    }

    public function edit(User $user){
        return view('user.edit', compact('user'));
    }

    public function update(User $user){
        $data = request()->validate([
            'nama' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
        ], [
            'nama.required' => 'Nama Tidak Boleh Kosong',
            'username.required' => 'username Tidak Boleh Kosong',
            'password.required' => 'password Tidak Boleh Kosong',
        ]);
        $user->update($data);
        return redirect('user')->with('success', 'Data Berhasil di Ubah');
    }

    public function destroy(User $user){
        $user->delete();
        return redirect('user')->with('success', 'Data Berhasil di Hapus');
    }
}
