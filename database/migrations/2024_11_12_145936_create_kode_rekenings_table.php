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
        Schema::create('kode_rekenings', function (Blueprint $table) {
            $table->id();
            $table->string('kode_rekening')->unique();
            $table->string('uraian');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('kode_rekenings')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('anggarans', function (Blueprint $table) {
            $table->dropForeign(['kode_rekening_id']);
        });
    
        // Drop kode_rekenings
        Schema::dropIfExists('kode_rekenings');
    }
};
