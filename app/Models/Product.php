<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_kategori',
        'id_satuan',
        'kode_produk',
        'nama_produk',
        'harga_jual',
        'stok',
    ];
    public static function getData()
    {
        $sql = DB::select(
            'SELECT p.*,
                    k.nama_kategori,
                    s.nama_satuan 
             FROM products p
             LEFT JOIN kategoris k on k.id = p.id_kategori
             LEFT JOIN satuans s on s.id = p.id_satuan
             ORDER BY p.id ASC '
        );
        return $sql;
    }
    public static function getDetail($id)
    {
        $sql = DB::select(
            'SELECT p.*,
                    k.nama_kategori,
                    s.nama_satuan 
             FROM products p
             LEFT JOIN kategoris k on k.id = p.id_kategori
             LEFT JOIN satuans s on s.id = p.id_satuan
             WHERE p.id = ?
             ORDER BY p.id ASC ',
            [$id]
        );
        $data = !empty($sql) ? $sql[0] : null;
        return $data;
    }
}
