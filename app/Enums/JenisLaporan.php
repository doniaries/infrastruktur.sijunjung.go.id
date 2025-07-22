<?php

namespace App\Enums;

enum JenisLaporan: string
{
    case LAPORAN_GANGGUAN = 'Laporan Gangguan';
    case KOORDINASI_TEKNIS = 'Koordinasi Teknis';
    case KENAIKAN_BANDWIDTH = 'Kenaikan Bandwidth';

    /**
     * Get the label for the enum value
     */
    public function getLabel(): string
    {
        return match ($this) {
            self::LAPORAN_GANGGUAN => 'Laporan Gangguan',
            self::KOORDINASI_TEKNIS => 'Koordinasi Teknis',
            self::KENAIKAN_BANDWIDTH => 'Kenaikan Bandwidth',
        };
    }

    /**
     * Get the color for the enum value
     */
    public function getColor(): string
    {
        return match ($this) {
            self::LAPORAN_GANGGUAN => 'danger',
            self::KOORDINASI_TEKNIS => 'warning',
            self::KENAIKAN_BANDWIDTH => 'success',
        };
    }

    /**
     * Get all values as an array
     */
    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * Get all cases as an array for select options
     */
    public static function getSelectOptions(): array
    {
        $options = [];
        foreach (self::cases() as $case) {
            $options[$case->value] = $case->getLabel();
        }
        return $options;
    }
}
