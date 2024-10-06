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
        Schema::create('anggarans', function (Blueprint $table) {
            $table->id();
            $table->integer('nominal');
            $table->date('tahun');
            $table->date('bulan');
            $table->integer('realisasi_gu');
            $table->integer('realisasi_ls');
            $table->integer('jumlah_realisasi');
            $table->float('persentase_anggaran');
            $table->integer('saldo_anggaran');
            $table->string('kode_rekening4')->foreign();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggarans');
    }
};
