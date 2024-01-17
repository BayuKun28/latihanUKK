<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Satuan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_satuan',
    ];
    public static function getData()
    {
        $sql = DB::select('SELECT * FROM satuans');
        return $sql;
    }
    public static function getDetail($id)
    {
        $sql = DB::table('satuans')
            ->select('*')
            ->where('satuans.id', $id)
            ->first();
        return $sql;
    }
}
