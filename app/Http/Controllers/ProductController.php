<?php

namespace App\Http\Controllers;

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
        ];
        return view('product.index', compact('data'));
    }
}
