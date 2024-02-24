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
        Schema::create('peminjaman_mobils', function (Blueprint $table) {
            $table->id();
            $table->integer('pengguna_id');
            $table->integer('mobil_id');
            $table->date('tgl_mulai_sewa');
            $table->date('tgl_selesai_sewa');
            $table->string('total_sewa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_mobils');
    }
};
