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
        Schema::create('nagaris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kecamatan_id')->constrained('kecamatans')->onDelete('cascade');
            $table->string('nama_nagari')->nullable();
            $table->string('nama_wali_nagari')->nullable();
            $table->string('kontak_wali_nagari')->nullable();
            $table->string('alamat_kantor_nagari')->nullable();
            $table->integer('jumlah_penduduk_nagari')->nullable();
            $table->integer('jumlah_jorong')->nullable();
            $table->integer('luas_nagari')->nullable();
            $table->timestamps();

            $table->unique(['kecamatan_id', 'nama_nagari']);
            $table->index('kecamatan_id');
            $table->index('nama_nagari');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nagaris');
    }
};
