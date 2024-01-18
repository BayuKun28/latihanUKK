<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Product;
use App\Models\Satuan;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Product',
            'menu' => 'Product',
            'submenu' => 'Data',
            'nama_user' => 'Example Nama',
            'table' => Product::getData()
        ];
        return view('product.index', compact('data'));
    }
    public function v_tambah()
    {
        $data = [
            'title' => 'Tambah Product',
            'menu' => 'Manage Product',
            'submenu' => 'Tambah Product',
            'nama_user' => 'Example Nama',
            'kategori' => Kategori::getData(),
            'satuan' => Satuan::getData(),
        ];
        return view('product.v_tambah', compact('data'));
    }
    function tambah(Request $request)
    {
        $request->validate([
            'kode_produk' => 'required|unique:products',
            'nama_produk' => 'required',
            'kategori' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);
        Product::create(
            [
                'nama_produk' => $request->nama_produk,
                'kode_produk' => $request->kode_produk,
                'id_kategori' => $request->kategori,
                'id_satuan' => $request->satuan,
                'harga_jual' => $request->harga,
                'stok' => $request->stok,
            ]
        );
        return redirect()->route('product')->withSuccess('Data Berhasil Disimpan');
    }
    public function v_edit($id)
    {
        $data = [
            'title' => 'Edit Product',
            'menu' => 'Manage Product',
            'submenu' => 'Edit Product',
            'nama_user' => 'Example Nama',
            'detail' => Product::getDetail($id),
            'kategori' => Kategori::getData(),
            'satuan' => Satuan::getData(),
        ];
        return view('product.v_edit', compact('data'));
    }
    function edit(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'kode_produk' => 'required',
            'nama_produk' => 'required',
            'kategori' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);
        Product::where('id', $id)
            ->update([
                'nama_produk' => $request->nama_produk,
                'kode_produk' => $request->kode_produk,
                'id_kategori' => $request->kategori,
                'id_satuan' => $request->satuan,
                'harga_jual' => $request->harga,
                'stok' => $request->stok,
            ]);
        return redirect()->route('product')->withSuccess('Data Berhasil Disimpan');
    }
    public function delete($id)
    {
        Product::find($id)->delete();
        return redirect()->route('product')->withSuccess('Data Berhasil Dihapus');
    }
}
