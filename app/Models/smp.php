<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class smp extends Model
{
    use HasFactory;

    protected $table = 'smp';
    protected $fillable = [
        'nama',
        'npsn',
        'alamat',
        'desa_kelurahan',
        'kecamatan',
        'kabupaten_kota',
        'kode_pos',
        'status_sekolah',
        'waktu_penyelenggaraan',
        'telepon',
        'email',
        'website',
        'latitude',
        'longitude',
        'gambar',
    ];
    public $timestamps = false;
}
