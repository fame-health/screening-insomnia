<?php

namespace App\Filament\Widgets;

use App\Models\InsomniaScreening;
use BackedEnum;
use Filament\Widgets\ChartWidget;
use Filament\Support\Icons\Heroicon;

class GenderByInstrumentChart extends ChartWidget
{
    protected ?string $heading = 'Jenis screening menurut gender';

    protected ?string $description = 'Lihat jumlah pengisian setiap jenis screening pada masing-masing kelompok.';

    protected ?string $maxHeight = '300px';

    protected ?string $pollingInterval = null;

    protected string|BackedEnum|null $emptyStateIcon = Heroicon::OutlinedChartBar;

    protected int|string|array $columnSpan = ['default' => 1, 'xl' => 2];

    protected ?array $options = [
        'plugins' => [
            'legend' => [
                'position' => 'bottom',
            ],
        ],
        'scales' => [
            'y' => [
                'beginAtZero' => true,
                'ticks' => ['precision' => 0],
            ],
        ],
    ];

    protected function getData(): array
    {
        $instruments = [
            'remaja' => 'Screening remaja',
            'medis' => 'Masalah medis',
        ];

        $datasets = [];
        foreach ($instruments as $instrument => $label) {
            $datasets[] = [
                'label' => $label,
                'data' => [
                    InsomniaScreening::query()->where('gender', 'Laki-laki')->where('instrument', $instrument)->count(),
                    InsomniaScreening::query()->where('gender', 'Perempuan')->where('instrument', $instrument)->count(),
                ],
                'backgroundColor' => $instrument === 'remaja' ? '#2563eb' : '#38bdf8',
                'borderRadius' => 6,
                'maxBarThickness' => 56,
            ];
        }

        return [
            'labels' => ['Laki-laki', 'Perempuan'],
            'datasets' => $datasets,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    public function isEmpty(): bool
    {
        return InsomniaScreening::query()->count() === 0;
    }

    public function getEmptyStateHeading(): string
    {
        return 'Data belum tersedia';
    }

    public function getEmptyStateDescription(): ?string
    {
        return 'Perbandingan akan muncul setelah peserta mengirim formulir.';
    }

    public function getChartAssistiveContent(): string
    {
        $maleTeen = InsomniaScreening::query()->where('gender', 'Laki-laki')->where('instrument', 'remaja')->count();
        $femaleTeen = InsomniaScreening::query()->where('gender', 'Perempuan')->where('instrument', 'remaja')->count();
        $maleMedical = InsomniaScreening::query()->where('gender', 'Laki-laki')->where('instrument', 'medis')->count();
        $femaleMedical = InsomniaScreening::query()->where('gender', 'Perempuan')->where('instrument', 'medis')->count();

        return "Screening remaja: {$maleTeen} laki-laki dan {$femaleTeen} perempuan. Masalah medis: {$maleMedical} laki-laki dan {$femaleMedical} perempuan.";
    }
}
