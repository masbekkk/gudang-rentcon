<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_mesin',
        'lokasi_mesin',
        'kondisi_mesin',
        'spesifikasi_mesin'
    ];

    public function suratBarang()
    {
        return $this->hasMany(BarangSuratJalan::class, 'barang_id', 'id');
    }
}
