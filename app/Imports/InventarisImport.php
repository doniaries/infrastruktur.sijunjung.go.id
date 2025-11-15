<?php

namespace App\Imports;

use App\Models\Opd;
use App\Models\Peralatan;
use EightyNine\ExcelImport\EnhancedDefaultImport;
use Illuminate\Support\Collection;

class InventarisImport extends EnhancedDefaultImport
{
    protected array $expectedHeaders = [
        'opd',
        'router',
        'jumlah router',
        'hub',
        'jumlah hub',
        'ap',
        'jumlah ap',
        'status',
    ];

    protected function normalizeKey(string $key): string
    {
        return strtolower(trim($key));
    }

    protected function get(string $key, array $data): mixed
    {
        $key = $this->normalizeKey($key);
        foreach ($data as $k => $v) {
            if ($this->normalizeKey($k) === $key) {
                return $v;
            }
        }
        return null;
    }

    protected function beforeCollection(Collection $collection): void
    {
        $this->validateHeaders($this->expectedHeaders, $collection);

        $opdNames = [];
        $peralatanNames = [];
        foreach ($collection as $row) {
            $data = $row->toArray();
            $opd = $this->get('OPD', $data);
            if ($opd) { $opdNames[] = trim($opd); }

            foreach (['Router', 'HUB', 'AP'] as $k) {
                $name = $this->get($k, $data);
                if ($name) { $peralatanNames[] = trim($name); }
            }
        }

        $missingOpds = collect(array_unique($opdNames))
            ->filter(fn($n) => !Opd::where('nama', $n)->exists())
            ->values()
            ->all();

        $missingPeralatans = collect(array_unique($peralatanNames))
            ->filter(fn($n) => !Peralatan::where('nama', $n)->exists())
            ->values()
            ->all();

        if (!empty($missingOpds)) {
            $this->stopImportWithError('OPD tidak ditemukan: '.implode(', ', $missingOpds));
        }

        if (!empty($missingPeralatans)) {
            $this->stopImportWithError('Peralatan tidak ditemukan: '.implode(', ', $missingPeralatans));
        }
    }

    protected function mapStatus(?string $excelStatus): string
    {
        $val = strtolower(trim((string) $excelStatus));
        return match ($val) {
            'aktif' => 'baik',
            'tidak aktif' => 'tidak digunakan',
            default => $val ?: 'baik',
        };
    }

    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            $data = $row->toArray();

            $opd = Opd::where('nama', trim((string) $this->get('OPD', $data)))->first();
            $status = $this->mapStatus($this->get('Status', $data));

            $groups = [
                ['nameKey' => 'Router', 'qtyKey' => 'Jumlah Router'],
                ['nameKey' => 'HUB', 'qtyKey' => 'Jumlah Hub'],
                ['nameKey' => 'AP', 'qtyKey' => 'Jumlah AP'],
            ];

            foreach ($groups as $g) {
                $peralatanName = trim((string) $this->get($g['nameKey'], $data));
                $qty = $this->get($g['qtyKey'], $data);
                $jumlah = is_numeric($qty) ? (int) $qty : 0;

                if ($peralatanName === '' || $jumlah <= 0) {
                    continue;
                }

                $peralatan = Peralatan::where('nama', $peralatanName)->first();
                if (!$peralatan) {
                    $this->stopImportWithError('Peralatan tidak ditemukan: '.$peralatanName);
                }

                if (!$opd) {
                    $this->stopImportWithError('OPD tidak ditemukan: '.(string) $this->get('OPD', $data));
                }

                $this->model::create([
                    'opd_id' => $opd->id,
                    'peralatan_id' => $peralatan->id,
                    'jenis_peralatan' => $peralatan->jenis_peralatan,
                    'jumlah' => $jumlah,
                    'status' => $status,
                ]);
            }
        }

        return $collection;
    }
}