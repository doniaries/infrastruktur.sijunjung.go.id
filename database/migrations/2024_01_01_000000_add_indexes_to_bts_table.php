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
        Schema::table('bts', function (Blueprint $table) {
            // Add indexes for foreign keys
            $table->index('operator_id');
            $table->index('kecamatan_id');
            $table->index('nagari_id');
            $table->index('jorong_id');
            
            // Add indexes for frequently filtered/sorted columns
            $table->index('teknologi');
            $table->index('status');
            $table->index('tahun_bangun');
            
            // Add composite index for common query patterns
            $table->index(['kecamatan_id', 'nagari_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bts', function (Blueprint $table) {
            $table->dropIndex(['operator_id']);
            $table->dropIndex(['kecamatan_id']);
            $table->dropIndex(['nagari_id']);
            $table->dropIndex(['jorong_id']);
            $table->dropIndex(['teknologi']);
            $table->dropIndex(['status']);
            $table->dropIndex(['tahun_bangun']);
            $table->dropIndex(['kecamatan_id', 'nagari_id', 'status']);
        });
    }
};
