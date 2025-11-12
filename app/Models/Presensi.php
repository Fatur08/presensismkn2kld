<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $table = 'presensi'; // Menyesuaikan dengan nama tabel di database

    protected $primaryKey = 'id'; // Menentukan primary key tabel

    protected $fillable = [
        'nisn',
        'tgl_presensi',
        'jam_in',
        'jam_out',
        'lokasi_in',
        'lokasi_out'
    ];

    protected $casts = [
        'tgl_presensi' => 'date', // Mengonversi ke format tanggal
        'jam_in' => 'datetime', // Mengonversi ke format datetime
        'jam_out' => 'datetime', // Mengonversi ke format datetime
    ];

    public $timestamps = false; // Menonaktifkan created_at dan updated_at
}

