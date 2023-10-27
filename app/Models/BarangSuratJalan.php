<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangSuratJalan extends Model
{
    use HasFactory;

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }

    public function suratJalan()
    {
        return $this->belongsTo(SuratJalan::class, 'surat_id', 'id');
    }
}
