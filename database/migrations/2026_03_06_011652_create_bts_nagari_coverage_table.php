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
        Schema::create('bts_nagari_coverage', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bts_id')->constrained('bts')->onDelete('cascade');
            $table->foreignId('nagari_id')->constrained('nagaris')->onDelete('cascade');
            $table->foreignId('jorong_id')->nullable()->constrained('jorongs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bts_nagari_coverage');
    }
};
