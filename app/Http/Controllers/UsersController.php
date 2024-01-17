<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Manage Users',
            'menu' => 'Manage Users',
            'submenu' => 'Data',
            'nama_user' => 'Example Nama',
            'table' => User::getData()
        ];
        return view('users.index', compact('data'));
    }
    public function v_tambah()
    {
        $data = [
            'title' => 'Tambah Users',
            'menu' => 'Manage Users',
            'submenu' => 'Tambah Users',
            'nama_user' => 'Example Nama',
        ];
        return view('users.v_tambah', compact('data'));
    }
    function tambah(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'level' => 'required',
        ]);
        User::create(
            [
                'nama' => $request->nama,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'level' => $request->level,
            ]
        );
        return redirect()->route('users')->withSuccess('Data Berhasil Disimpan');
    }
    public function v_edit($id)
    {
        $data = [
            'title' => 'Edit Users',
            'menu' => 'Manage Users',
            'submenu' => 'Edit Users',
            'nama_user' => 'Example Nama',
            'detail' =>  User::getDetail($id)
        ];
        return view('users.v_edit', compact('data'));
    }
    public function edit(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'level' => 'required',
        ]);
        User::where('id', $id)
            ->update([
                'nama' => $request->nama,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'level' => $request->level,
            ]);
        return redirect()->route('users')->withSuccess('Data Berhasil Disimpan');
    }

    public function delete($id)
    {
        User::find($id)->delete();
        return redirect()->route('users')->withSuccess('Data Berhasil Dihapus');
    }
}
