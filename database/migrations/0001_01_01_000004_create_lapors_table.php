<?php

use App\Enums\JenisLaporan;
use App\Enums\StatusLaporan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lapors', function (Blueprint $table) {
            $table->id();
            $table->string('no_tiket')->unique()->index();
            $table->datetime('tgl_laporan');
            $table->string('nama_pelapor');
            $table->string('nomor_kontak')->index()->unique();
            $table->foreignId('opd_id')->constrained('opds')->cascadeOnDelete();
            $table->enum('jenis_laporan', ['Laporan Gangguan', 'Koordinasi Teknis', 'Kenaikan Bandwidth'])->default('Laporan Gangguan');
            $table->text('uraian_laporan')->nullable();
            $table->string('file_laporan')->nullable();
            $table->string('foto_laporan')->nullable();
            $table->string('status_laporan')->default(StatusLaporan::BELUM_DIPROSES->value);
            $table->foreignId('petugas_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('keterangan_petugas')->default('belum ada');
            // $table->string('hasil_laporan')->default('belum ada');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lapors');
    }
};
