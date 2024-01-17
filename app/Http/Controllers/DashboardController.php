<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'menu' => 'Dashboard',
            'submenu' => '',
            'nama_user' => 'Example Nama',
        ];
        return view('dashboard.index', compact('data'));
    }
}
