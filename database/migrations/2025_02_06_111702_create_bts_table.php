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
        Schema::create('bts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('operator_id')->nullable()->constrained('operators');
            $table->foreignId('kecamatan_id')->constrained('kecamatans');
            $table->foreignId('nagari_id')->constrained('nagaris');
            $table->foreignId('jorong_id')->nullable()->constrained('jorongs');
            $table->string('pemilik')->nullable();
            $table->string('alamat')->nullable();
            $table->string('titik_koordinat')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->enum('teknologi', ['2G', '3G', '4G', '4G+5G', '5G'])->nullable()->default('4G');
            $table->enum('status', ['aktif', 'non-aktif'])->nullable()->default('aktif');
            $table->string('tahun_bangun');
            $table->timestamps();

            $table->index('operator_id');
            $table->index('kecamatan_id');
            $table->index('nagari_id');
            $table->index('jorong_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bts');
    }
};
