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
        Schema::create('sub_kodrek4s', function (Blueprint $table) {
            $table->id();
            $table->string('kode_rekening4')->unique();
            $table->string('uraian');
            $table->string('kode_rekening3')->foreign();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_kodrek4s');
    }
};
