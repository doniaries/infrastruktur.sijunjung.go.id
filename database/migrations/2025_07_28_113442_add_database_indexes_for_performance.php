<?php

use Illuminate\Support\Facades\DB;
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
        // Helper function to check if index exists
        $indexExists = function ($table, $indexName) {
            $indexes = collect(DB::select("SHOW INDEX FROM {$table}"))
                ->pluck('Key_name')
                ->toArray();
            return in_array($indexName, $indexes);
        };

        // Indexes untuk tabel bts
        Schema::table('bts', function (Blueprint $table) use ($indexExists) {
            if (!$indexExists('bts', 'bts_operator_id_status_index')) {
                $table->index(['operator_id', 'status'], 'bts_operator_id_status_index');
            }
            if (!$indexExists('bts', 'bts_kecamatan_id_teknologi_index')) {
                $table->index(['kecamatan_id', 'teknologi'], 'bts_kecamatan_id_teknologi_index');
            }
            if (!$indexExists('bts', 'bts_status_index')) {
                $table->index(['status'], 'bts_status_index');
            }
            if (!$indexExists('bts', 'bts_teknologi_index')) {
                $table->index(['teknologi'], 'bts_teknologi_index');
            }
            if (!$indexExists('bts', 'bts_alamat_index')) {
                $table->index(['alamat'], 'bts_alamat_index');
            }
            if (!$indexExists('bts', 'bts_tahun_bangun_index')) {
                $table->index(['tahun_bangun'], 'bts_tahun_bangun_index');
            }
        });

        // Indexes untuk tabel jorongs
        Schema::table('jorongs', function (Blueprint $table) use ($indexExists) {
            if (!$indexExists('jorongs', 'jorongs_nama_jorong_index')) {
                $table->index(['nama_jorong'], 'jorongs_nama_jorong_index');
            }
            if (!$indexExists('jorongs', 'jorongs_nama_kepala_jorong_index')) {
                $table->index(['nama_kepala_jorong'], 'jorongs_nama_kepala_jorong_index');
            }
        });

        // Indexes untuk tabel nagaris
        Schema::table('nagaris', function (Blueprint $table) use ($indexExists) {
            if (!$indexExists('nagaris', 'nagaris_nama_nagari_index')) {
                $table->index(['nama_nagari'], 'nagaris_nama_nagari_index');
            }
            if (!$indexExists('nagaris', 'nagaris_nama_wali_nagari_index')) {
                $table->index(['nama_wali_nagari'], 'nagaris_nama_wali_nagari_index');
            }
        });

        // Indexes untuk tabel lapors
        Schema::table('lapors', function (Blueprint $table) use ($indexExists) {
            if (!$indexExists('lapors', 'lapors_opd_id_status_laporan_index')) {
                $table->index(['opd_id', 'status_laporan'], 'lapors_opd_id_status_laporan_index');
            }
            if (!$indexExists('lapors', 'lapors_no_tiket_index')) {
                $table->index(['no_tiket'], 'lapors_no_tiket_index');
            }
            if (!$indexExists('lapors', 'lapors_nama_pelapor_index')) {
                $table->index(['nama_pelapor'], 'lapors_nama_pelapor_index');
            }
            if (!$indexExists('lapors', 'lapors_status_laporan_index')) {
                $table->index(['status_laporan'], 'lapors_status_laporan_index');
            }
            if (!$indexExists('lapors', 'lapors_created_at_index')) {
                $table->index(['created_at'], 'lapors_created_at_index');
            }
            if (!$indexExists('lapors', 'lapors_tgl_laporan_index')) {
                $table->index(['tgl_laporan'], 'lapors_tgl_laporan_index');
            }
        });

        // Indexes untuk tabel operators
        Schema::table('operators', function (Blueprint $table) use ($indexExists) {
            if (!$indexExists('operators', 'operators_nama_operator_index')) {
                $table->index(['nama_operator'], 'operators_nama_operator_index');
            }
        });

        // Indexes untuk tabel kecamatans
        Schema::table('kecamatans', function (Blueprint $table) use ($indexExists) {
            if (!$indexExists('kecamatans', 'kecamatans_nama_index')) {
                $table->index(['nama'], 'kecamatans_nama_index');
            }
        });

        // Indexes untuk tabel opds
        Schema::table('opds', function (Blueprint $table) use ($indexExists) {
            if (!$indexExists('opds', 'opds_nama_index')) {
                $table->index(['nama'], 'opds_nama_index');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Helper function to check if index exists
        $indexExists = function ($table, $indexName) {
            $indexes = collect(DB::select("SHOW INDEX FROM {$table}"))
                ->pluck('Key_name')
                ->toArray();
            return in_array($indexName, $indexes);
        };

        // Drop indexes untuk tabel bts
        Schema::table('bts', function (Blueprint $table) use ($indexExists) {
            if ($indexExists('bts', 'bts_operator_id_status_index')) {
                $table->dropIndex('bts_operator_id_status_index');
            }
            if ($indexExists('bts', 'bts_kecamatan_id_teknologi_index')) {
                $table->dropIndex('bts_kecamatan_id_teknologi_index');
            }
            if ($indexExists('bts', 'bts_status_index')) {
                $table->dropIndex('bts_status_index');
            }
            if ($indexExists('bts', 'bts_teknologi_index')) {
                $table->dropIndex('bts_teknologi_index');
            }
            if ($indexExists('bts', 'bts_alamat_index')) {
                $table->dropIndex('bts_alamat_index');
            }
            if ($indexExists('bts', 'bts_tahun_bangun_index')) {
                $table->dropIndex('bts_tahun_bangun_index');
            }
        });

        // Drop indexes untuk tabel jorongs
        Schema::table('jorongs', function (Blueprint $table) use ($indexExists) {
            if ($indexExists('jorongs', 'jorongs_nama_jorong_index')) {
                $table->dropIndex('jorongs_nama_jorong_index');
            }
            if ($indexExists('jorongs', 'jorongs_nama_kepala_jorong_index')) {
                $table->dropIndex('jorongs_nama_kepala_jorong_index');
            }
        });

        // Drop indexes untuk tabel nagaris
        Schema::table('nagaris', function (Blueprint $table) use ($indexExists) {
            if ($indexExists('nagaris', 'nagaris_nama_nagari_index')) {
                $table->dropIndex('nagaris_nama_nagari_index');
            }
            if ($indexExists('nagaris', 'nagaris_nama_wali_nagari_index')) {
                $table->dropIndex('nagaris_nama_wali_nagari_index');
            }
        });

        // Drop indexes untuk tabel lapors
        Schema::table('lapors', function (Blueprint $table) use ($indexExists) {
            if ($indexExists('lapors', 'lapors_opd_id_status_laporan_index')) {
                $table->dropIndex('lapors_opd_id_status_laporan_index');
            }
            if ($indexExists('lapors', 'lapors_no_tiket_index')) {
                $table->dropIndex('lapors_no_tiket_index');
            }
            if ($indexExists('lapors', 'lapors_nama_pelapor_index')) {
                $table->dropIndex('lapors_nama_pelapor_index');
            }
            if ($indexExists('lapors', 'lapors_status_laporan_index')) {
                $table->dropIndex('lapors_status_laporan_index');
            }
            if ($indexExists('lapors', 'lapors_created_at_index')) {
                $table->dropIndex('lapors_created_at_index');
            }
            if ($indexExists('lapors', 'lapors_tgl_laporan_index')) {
                $table->dropIndex('lapors_tgl_laporan_index');
            }
        });

        // Drop indexes untuk tabel operators
        Schema::table('operators', function (Blueprint $table) use ($indexExists) {
            if ($indexExists('operators', 'operators_nama_operator_index')) {
                $table->dropIndex('operators_nama_operator_index');
            }
        });

        // Drop indexes untuk tabel kecamatans
        Schema::table('kecamatans', function (Blueprint $table) use ($indexExists) {
            if ($indexExists('kecamatans', 'kecamatans_nama_index')) {
                $table->dropIndex('kecamatans_nama_index');
            }
        });

        // Drop indexes untuk tabel opds
        Schema::table('opds', function (Blueprint $table) use ($indexExists) {
            if ($indexExists('opds', 'opds_nama_index')) {
                $table->dropIndex('opds_nama_index');
            }
        });
    }
};
