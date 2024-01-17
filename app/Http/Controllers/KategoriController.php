<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Kategori',
            'menu' => 'Kategori',
            'submenu' => 'Data',
            'nama_user' => 'Example Nama',
            'table' => Kategori::getdata(),
        ];
        return view('kategori.index', compact('data'));
    }
    public function v_tambah()
    {
        $data = [
            'title' => 'Tambah Kategori',
            'menu' => 'Manage Kategori',
            'submenu' => 'Tambah Kategori',
            'nama_user' => 'Example Nama',
        ];
        return view('kategori.v_tambah', compact('data'));
    }
    function tambah(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:kategoris',
        ]);
        Kategori::create(
            [
                'nama_kategori' => $request->nama_kategori,
            ]
        );
        return redirect()->route('kategori')->withSuccess('Data Berhasil Disimpan');
    }
    public function v_edit($id)
    {
        $data = [
            'title' => 'Edit Kategori',
            'menu' => 'Manage Kategori',
            'submenu' => 'Edit Kategori',
            'nama_user' => 'Example Nama',
            'detail' => Kategori::getDetail($id)
        ];
        return view('kategori.v_edit', compact('data'));
    }
    public function edit(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'nama_kategori' => 'required',
        ]);
        Kategori::where('id', $id)
            ->update([
                'nama_kategori' => $request->nama_kategori,
            ]);
        return redirect()->route('kategori')->withSuccess('Data Berhasil Disimpan');
    }

    public function delete($id)
    {
        Kategori::find($id)->delete();
        return redirect()->route('kategori')->withSuccess('Data Berhasil Dihapus');
    }
}
