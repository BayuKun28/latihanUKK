<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [DashboardController::class, 'index']);
Route::controller(UsersController::class)->group(function () {
    Route::get('/users', 'index')->name('users');
    Route::get('/v_tambah_users', 'v_tambah')->name('v_tambah_users');
    Route::post('/tambah_user', 'tambah')->name('tambah_user');
    Route::get('/v_edit_users/{id}', 'v_edit')->name('v_edit_users');
    Route::post('/edit_user', 'edit')->name('edit_user');
    Route::get('/deleteUser/{id}', 'delete')->name('deleteUser');
});
Route::controller(KategoriController::class)->group(function () {
    Route::get('/kategori', 'index')->name('kategori');
    Route::get('/v_tambah_kategori', 'v_tambah')->name('v_tambah_kategori');
    Route::post('/tambah_kategori', 'tambah')->name('tambah_kategori');
    Route::get('/v_edit_kategori/{id}', 'v_edit')->name('v_edit_kategori');
    Route::post('/edit_kategori', 'edit')->name('edit_kategori');
    Route::get('/deleteKategori/{id}', 'delete')->name('deleteKategori');
});
Route::controller(SatuanController::class)->group(function () {
    Route::get('/satuan', 'index')->name('satuan');
    Route::get('/v_tambah_satuan', 'v_tambah')->name('v_tambah_satuan');
    Route::post('/tambah_satuan', 'tambah')->name('tambah_satuan');
    Route::get('/v_edit_satuan/{id}', 'v_edit')->name('v_edit_satuan');
    Route::post('/edit_satuan', 'edit')->name('edit_satuan');
    Route::get('/deleteSatuan/{id}', 'delete')->name('deleteSatuan');
});
Route::controller(ProductController::class)->group(function () {
    Route::get('/product', 'index')->name('product');
    Route::get('/v_tambah_product', 'v_tambah')->name('v_tambah_product');
    Route::post('/tambah_product', 'tambah')->name('tambah_product');
    Route::get('/v_edit_product/{id}', 'v_edit')->name('v_edit_product');
    Route::post('/edit_product', 'edit')->name('edit_product');
    Route::get('/deleteProduct/{id}', 'delete')->name('deleteProduct');
});
