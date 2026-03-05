<?php

namespace Database\Seeders;

use App\Models\Bts;
use Illuminate\Database\Seeder;

class BtsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama
        \App\Models\Bts::query()->delete();

        $filePath = base_path('bts.xlsx');

        if (!file_exists($filePath)) {
            $this->command->error("File bts.xlsx tidak ditemukan di: " . $filePath);
            return;
        }

        try {
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
            $worksheet = $spreadsheet->getActiveSheet();
            $rows = $worksheet->toArray(null, true, true, true);

            $count = 0;
            foreach ($rows as $index => $row) {
                // Skip header (Baris 1)
                if ($index === 1) continue;

                // Skip jika baris kosong (cek operator_id atau pemilik)
                if (empty($row['B']) && empty($row['C'])) continue;

                $latitude = null;
                $longitude = null;

                // Parse koordinat dari kolom G (format: "lat, lng")
                if (!empty($row['G'])) {
                    $coords = explode(',', $row['G']);
                    if (count($coords) === 2) {
                        $latitude = trim($coords[0]);
                        $longitude = trim($coords[1]);
                    }
                }

                \App\Models\Bts::create([
                    'operator_id' => $row['B'] ?? null,
                    'pemilik' => $row['C'] ?? 'Tidak Diketahui',
                    'kecamatan_id' => $row['D'] ?? null,
                    'nagari_id' => $row['E'] ?? null,
                    'jorong_id' => null, // Kolom F adalah alamat, tidak ada jorong_id spesifik
                    'alamat' => $row['F'] ?? null,
                    'titik_koordinat' => !empty($row['G']) ? $row['G'] : null,
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                    'teknologi' => !empty($row['H']) ? strtoupper($row['H']) : '4G',
                    'status' => !empty($row['I']) && strtolower($row['I']) === 'aktif' ? 'aktif' : 'non-aktif',
                    'tahun_bangun' => $row['J'] ?? date('Y'),
                ]);
                $count++;
            }

            $this->command->info("Berhasil mengimpor $count data BTS dari bts.xlsx");
        } catch (\Exception $e) {
            $this->command->error("Terjadi kesalahan saat mengimpor Excel: " . $e->getMessage());
        }
    }
}
