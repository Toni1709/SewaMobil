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
        Schema::create('pengembalian_mobils', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->integer('pengguna_id');
            $table->integer('mobil_id');
            $table->integer('lama_sewa');
            $table->string('total_harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalian_mobils');
    }
};
