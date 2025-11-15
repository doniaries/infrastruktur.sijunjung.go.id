<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\JorongSeeder;
use Database\Seeders\NagariSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Only show warning when running seeders directly, not during tests
        if (app()->runningInConsole() && !app()->runningUnitTests()) {
            $this->command->warn('==================================================');
            $this->command->warn(' PERINGATAN: DATA AKAN DIHAPUS DAN DIISI KEMBALI');
            $this->command->warn('==================================================');
            $this->command->warn('Tindakan ini akan menghapus SEMUA DATA yang ada di database.');
            $this->command->warn('Pastikan Anda sudah membackup data penting sebelum melanjutkan.');
            $this->command->line('');
            
            if (!$this->command->confirm('Apakah Anda yakin ingin melanjutkan?', false)) {
                $this->command->info('Proses seeding dibatalkan.');
                return;
            }
            
            $this->command->warn('Menghapus data lama dan menjalankan seeder...');
            $this->command->line('');
        }

        // User::factory(10)->create();

        $this->call([
            PeralatanSeeder::class,
            OperatorSeeder::class,
            KecamatanSeeder::class,
            NagariSeeder::class,
            JorongSeeder::class,
            BtsSeeder::class,
            OpdSeeder::class,    // Harus dijalankan sebelum LaporSeeder
            ShieldSeeder::class, // Harus dijalankan sebelum RoleSeeder untuk membuat permission
            RoleSeeder::class,   // Menggunakan permission yang dibuat oleh ShieldSeeder
            UserSeeder::class,   // Membuat user dengan role yang telah dibuat
            LaporSeeder::class,  // Membuat data laporan
        ]);
    }
}
