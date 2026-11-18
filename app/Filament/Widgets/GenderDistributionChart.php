<?php

namespace App\Filament\Widgets;

use App\Models\InsomniaScreening;
use BackedEnum;
use Filament\Widgets\ChartWidget;
use Filament\Support\Icons\Heroicon;

class GenderDistributionChart extends ChartWidget
{
    protected ?string $heading = 'Peserta berdasarkan jenis kelamin';

    protected ?string $description = 'Perbandingan jumlah peserta laki-laki dan perempuan.';

    protected ?string $maxHeight = '300px';

    protected ?string $pollingInterval = null;

    protected string|BackedEnum|null $emptyStateIcon = Heroicon::OutlinedChartPie;

    protected int|string|array $columnSpan = ['default' => 1, 'xl' => 2];

    protected ?array $options = [
        'cutout' => '66%',
        'plugins' => [
            'legend' => [
                'position' => 'bottom',
            ],
        ],
    ];

    protected function getData(): array
    {
        return [
            'labels' => ['Laki-laki', 'Perempuan'],
            'datasets' => [[
                'label' => 'Jumlah peserta',
                'data' => [
                    InsomniaScreening::query()->where('gender', 'Laki-laki')->count(),
                    InsomniaScreening::query()->where('gender', 'Perempuan')->count(),
                ],
                'backgroundColor' => ['#2563eb', '#ec4899'],
                'borderColor' => ['#ffffff', '#ffffff'],
                'borderWidth' => 4,
                'hoverOffset' => 8,
            ]],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    public function isEmpty(): bool
    {
        return InsomniaScreening::query()->count() === 0;
    }

    public function getEmptyStateHeading(): string
    {
        return 'Belum ada hasil screening';
    }

    public function getEmptyStateDescription(): ?string
    {
        return 'Diagram peserta akan terisi setelah formulir screening mulai digunakan.';
    }

    public function getChartAssistiveContent(): string
    {
        $male = InsomniaScreening::query()->where('gender', 'Laki-laki')->count();
        $female = InsomniaScreening::query()->where('gender', 'Perempuan')->count();

        return "Jumlah peserta: {$male} laki-laki dan {$female} perempuan.";
    }
}
