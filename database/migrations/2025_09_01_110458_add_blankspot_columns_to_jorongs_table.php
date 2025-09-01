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
        Schema::table('jorongs', function (Blueprint $table) {
            $table->boolean('status_blankspot')->default(false)->after('luas_jorong');
            $table->text('alasan_blankspot')->nullable()->after('status_blankspot');
            $table->string('koordinat_blankspot')->nullable()->after('alasan_blankspot');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jorongs', function (Blueprint $table) {
            $table->dropColumn([
                'status_blankspot',
                'alasan_blankspot',
                'koordinat_blankspot'
            ]);
        });
    }
};
