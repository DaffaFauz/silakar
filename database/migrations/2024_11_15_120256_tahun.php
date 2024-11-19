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
        Schema::create('tahun', function(Blueprint $table){
            $table->id();
            $table->year('tahun');
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
            $table->dropForeign(['tahun_id']);
        });
    
        // Drop kode_rekenings
        Schema::dropIfExists('tahun');
    }
};
