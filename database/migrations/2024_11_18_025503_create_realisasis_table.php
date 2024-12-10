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
        Schema::create('realisasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tahun_id')->constrained('tahun')->onDelete('cascade');
            $table->foreignId('anggaran_id')->constrained('anggarans')->onDelete('cascade');
            $table->integer('bulan'); // 1-12
            $table->bigInteger('realisasi_ls')->default(0); // Realisasi langsung
            $table->bigInteger('realisasi_gu')->default(0); // Ganti uang
            $table->bigInteger('jumlah_realisasi')->default(0);
            $table->bigInteger('persentase_anggaran')->default(0); // Dalam persen
            $table->bigInteger('saldo_anggaran')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realisasis');
    }
};
