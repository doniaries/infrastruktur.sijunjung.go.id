<?php

namespace App\Enums;

enum StatusLaporan: string
{
    case BELUM_DIPROSES = 'Belum Diproses';
    case SEDANG_DIPROSES = 'Sedang Diproses';
    case SELESAI_DIPROSES = 'Selesai Diproses';

    /**
     * Get the label for the enum value
     */
    public function getLabel(): string
    {
        return match ($this) {
            self::BELUM_DIPROSES => 'Belum Diproses',
            self::SEDANG_DIPROSES => 'Sedang Diproses',
            self::SELESAI_DIPROSES => 'Selesai Diproses',
        };
    }

    /**
     * Get the color for the enum value
     */
    public function getColor(): string
    {
        return match ($this) {
            self::BELUM_DIPROSES => 'danger',
            self::SEDANG_DIPROSES => 'warning',
            self::SELESAI_DIPROSES => 'success',
        };
    }

    /**
     * Get the icon for the enum value
     */
    public function getIcon(): string
    {
        return match ($this) {
            self::BELUM_DIPROSES => 'heroicon-o-exclamation-circle',
            self::SEDANG_DIPROSES => 'heroicon-o-clock',
            self::SELESAI_DIPROSES => 'heroicon-o-check-circle',
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
