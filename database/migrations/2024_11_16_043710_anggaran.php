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
            $table->year('tahun');
            $table->decimal('nominal', 15, 2)->nullable(); // Nilai anggaran
            $table->unique(['kode_rekening_id', 'tahun']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
