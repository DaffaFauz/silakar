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
        //
        Schema::create('anggarans', function (Blueprint $table){
            $table->id();
            $table->foreignId('kode_rekening_id')->constrained('kode_rekenings')->onDelete('cascade');
            $table->foreignId('tahun_id')->constrained('tahun')->onDelete('cascade');
            $table->decimal('nominal', 15, 2)->nullable(); // Nilai anggaran
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('anggarans', function (Blueprint $table) {
            $table->dropForeign(['kode_rekening_id']);
            $table->dropForeign(['tahun_id']);
        });
    
        Schema::dropIfExists('anggarans');
    }
};