<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Satuan',
            'menu' => 'Satuan',
            'submenu' => 'Data',
            'nama_user' => 'Example Nama',
            'table' => Satuan::getdata(),
        ];
        return view('satuan.index', compact('data'));
    }
    public function v_tambah()
    {
        $data = [
            'title' => 'Tambah Satuan',
            'menu' => 'Manage Satuan',
            'submenu' => 'Tambah Satuan',
            'nama_user' => 'Example Nama',
        ];
        return view('satuan.v_tambah', compact('data'));
    }
    function tambah(Request $request)
    {
        $request->validate([
            'nama_satuan' => 'required|unique:satuans',
        ]);
        Satuan::create(
            [
                'nama_satuan' => $request->nama_satuan,
            ]
        );
        return redirect()->route('satuan')->withSuccess('Data Berhasil Disimpan');
    }
    public function v_edit($id)
    {
        $data = [
            'title' => 'Edit Satuan',
            'menu' => 'Manage Satuan',
            'submenu' => 'Edit Satuan',
            'nama_user' => 'Example Nama',
            'detail' => Satuan::getDetail($id)
        ];
        return view('satuan.v_edit', compact('data'));
    }
    public function edit(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'nama_satuan' => 'required',
        ]);
        Satuan::where('id', $id)
            ->update([
                'nama_satuan' => $request->nama_satuan,
            ]);
        return redirect()->route('satuan')->withSuccess('Data Berhasil Disimpan');
    }

    public function delete($id)
    {
        Satuan::find($id)->delete();
        return redirect()->route('satuan')->withSuccess('Data Berhasil Dihapus');
    }
}
