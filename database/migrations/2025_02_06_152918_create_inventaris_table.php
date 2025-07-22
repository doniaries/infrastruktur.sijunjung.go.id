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
        Schema::create('inventaris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('opd_id')->constrained('opds')->cascadeOnDelete();
            $table->foreignId('peralatan_id')->constrained('peralatans')->cascadeOnDelete();
            $table->string('jenis_peralatan');
            $table->string('jumlah');
            $table->string('status');
            $table->timestamps();

            $table->index(['peralatan_id', 'opd_id'], 'peralatan_opd_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventaris');
    }
};