<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'username',
        'password',
        'level',
    ];

    public static function getData()
    {
        $sql = DB::select('SELECT u.*,(CASE WHEN u.level = 1 THEN "Admin" ELSE "Kasir" END) as terbilanglevel  FROM users u ORDER BY u.id ASC');
        return $sql;
    }
    public static function getDetail($id)
    {
        $sql = DB::table('users')
            ->select('users.*', DB::raw('CASE WHEN users.level = 1 THEN "Admin" ELSE "Kasir" END as terbilanglevel'))
            ->where('users.id', $id)
            ->first();
        return $sql;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
