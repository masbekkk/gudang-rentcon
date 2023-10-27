<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratJalan extends Model
{
    use HasFactory;

    public function barangSurat()
    {
        return $this->hasMany(BarangSuratJalan::class, 'surat_id', 'id');
    }
}
