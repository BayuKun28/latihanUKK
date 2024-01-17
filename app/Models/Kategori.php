<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kategori extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kategori',
    ];
    public static function getData()
    {
        $sql = DB::select('SELECT * FROM kategoris');
        return $sql;
    }
    public static function getDetail($id)
    {
        $sql = DB::table('kategoris')
            ->select('*')
            ->where('kategoris.id', $id)
            ->first();
        return $sql;
    }
}
