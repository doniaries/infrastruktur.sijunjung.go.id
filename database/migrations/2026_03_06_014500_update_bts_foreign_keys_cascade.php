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
            // Drop existing foreign keys
            $table->dropForeign(['nagari_id']);
            $table->dropForeign(['jorong_id']);

            // Re-add with onDelete('cascade')
            $table->foreign('nagari_id')
                ->references('id')
                ->on('nagaris')
                ->onDelete('cascade');

            $table->foreign('jorong_id')
                ->references('id')
                ->on('jorongs')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bts', function (Blueprint $table) {
            $table->dropForeign(['nagari_id']);
            $table->dropForeign(['jorong_id']);

            $table->foreign('nagari_id')
                ->references('id')
                ->on('nagaris');

            $table->foreign('jorong_id')
                ->references('id')
                ->on('jorongs');
        });
    }
};
