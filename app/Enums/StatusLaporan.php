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

    /**
     * Get the background color for the enum value (light mode)
     */
    public function getBackgroundColor(): string
    {
        return match ($this) {
            self::BELUM_DIPROSES => '#fef2f2',
            self::SEDANG_DIPROSES => '#fff7ed',
            self::SELESAI_DIPROSES => '#f0fdf4',
        };
    }

    /**
     * Get the text color for the enum value (light mode)
     */
    public function getTextColor(): string
    {
        return match ($this) {
            self::BELUM_DIPROSES => '#991b1b',
            self::SEDANG_DIPROSES => '#9a3412',
            self::SELESAI_DIPROSES => '#166534',
        };
    }

    /**
     * Get the border color for the enum value (light mode)
     */
    public function getBorderColor(): string
    {
        return match ($this) {
            self::BELUM_DIPROSES => '#fecaca',
            self::SEDANG_DIPROSES => '#fed7aa',
            self::SELESAI_DIPROSES => '#bbf7d0',
        };
    }

    /**
     * Get the background color for the enum value (dark mode)
     */
    public function getDarkBackgroundColor(): string
    {
        return match ($this) {
            self::BELUM_DIPROSES => '#7f1d1d',
            self::SEDANG_DIPROSES => '#78350f',
            self::SELESAI_DIPROSES => '#14532d',
        };
    }

    /**
     * Get the text color for the enum value (dark mode)
     */
    public function getDarkTextColor(): string
    {
        return match ($this) {
            self::BELUM_DIPROSES => '#fca5a5',
            self::SEDANG_DIPROSES => '#fbbf24',
            self::SELESAI_DIPROSES => '#86efac',
        };
    }

    /**
     * Get the border color for the enum value (dark mode)
     */
    public function getDarkBorderColor(): string
    {
        return match ($this) {
            self::BELUM_DIPROSES => '#991b1b',
            self::SEDANG_DIPROSES => '#92400e',
            self::SELESAI_DIPROSES => '#166534',
        };
    }

    /**
     * Get CSS class name for the status
     */
    public function getCssClass(): string
    {
        return match ($this) {
            self::BELUM_DIPROSES => 'status-belum',
            self::SEDANG_DIPROSES => 'status-sedang',
            self::SELESAI_DIPROSES => 'status-selesai',
        };
    }
}
