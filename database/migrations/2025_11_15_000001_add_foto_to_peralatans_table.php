<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('peralatans', function (Blueprint $table) {
            $table->string('foto')->nullable()->after('tahun_pengadaan');
        });
    }

    public function down(): void
    {
        Schema::table('peralatans', function (Blueprint $table) {
            $table->dropColumn('foto');
        });
    }
};