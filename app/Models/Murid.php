<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class Murid extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "murid";
    protected $primaryKey = "nisn";

    protected $fillable = [
        'nisn',
        'nama_lengkap',
        'jurusan',
        'no_hp',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
