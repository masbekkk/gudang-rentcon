<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surat_jalans', function (Blueprint $table) {
            $table->id();
            $table->string('penerima');
            $table->string('alamat_penerima');
            $table->string('kab_prov_penerima');
            $table->string('pic_penerima');
            $table->string('no_referensi');
            $table->date('tanggal');
            $table->string('pesan');
            $table->string('disiapkan');
            $table->string('dikirim');
            $table->string('diterima');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_jalans');
    }
};
