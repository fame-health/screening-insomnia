<?php

namespace App\Filament\Widgets;

use App\Models\InsomniaScreening;
use BackedEnum;
use Filament\Widgets\ChartWidget;
use Filament\Support\Icons\Heroicon;

class MonthlyScreeningTrendChart extends ChartWidget
{
    protected ?string $heading = 'Tren screening enam bulan terakhir';

    protected ?string $description = 'Jumlah formulir yang masuk per bulan, dipisahkan berdasarkan jenis kelamin.';

    protected ?string $maxHeight = '320px';

    protected ?string $pollingInterval = null;

    protected string|BackedEnum|null $emptyStateIcon = Heroicon::OutlinedChartBar;

    protected int|string|array $columnSpan = 'full';

    protected ?array $options = [
        'interaction' => [
            'intersect' => false,
            'mode' => 'index',
        ],
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
        $start = now()->startOfMonth()->subMonths(5);
        $end = now()->endOfMonth();

        $rows = InsomniaScreening::query()
            ->selectRaw('YEAR(created_at) as year_number, MONTH(created_at) as month_number, gender, COUNT(*) as screening_count')
            ->whereBetween('created_at', [$start, $end])
            ->groupByRaw('YEAR(created_at), MONTH(created_at), gender')
            ->get();

        $counts = [];
        foreach ($rows as $row) {
            $period = sprintf('%04d-%02d', $row->year_number, $row->month_number);
            $counts[$row->gender][$period] = (int) $row->screening_count;
        }

        $monthNames = [1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'Mei', 6 => 'Jun', 7 => 'Jul', 8 => 'Agu', 9 => 'Sep', 10 => 'Okt', 11 => 'Nov', 12 => 'Des'];
        $months = [];
        $labels = [];

        for ($offset = 0; $offset < 6; $offset++) {
            $month = $start->copy()->addMonths($offset);
            $period = $month->format('Y-m');
            $months[] = $period;
            $labels[] = $monthNames[(int) $month->format('n')].' '.$month->format('Y');
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Laki-laki',
                    'data' => array_map(fn (string $period): int => $counts['Laki-laki'][$period] ?? 0, $months),
                    'borderColor' => '#2563eb',
                    'backgroundColor' => '#2563eb',
                    'pointBackgroundColor' => '#2563eb',
                    'tension' => 0.35,
                ],
                [
                    'label' => 'Perempuan',
                    'data' => array_map(fn (string $period): int => $counts['Perempuan'][$period] ?? 0, $months),
                    'borderColor' => '#ec4899',
                    'backgroundColor' => '#ec4899',
                    'pointBackgroundColor' => '#ec4899',
                    'tension' => 0.35,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    public function isEmpty(): bool
    {
        return ! InsomniaScreening::query()
            ->where('created_at', '>=', now()->startOfMonth()->subMonths(5))
            ->exists();
    }

    public function getEmptyStateHeading(): string
    {
        return 'Belum ada tren bulanan';
    }

    public function getEmptyStateDescription(): ?string
    {
        return 'Grafik mulai terbentuk saat data screening masuk.';
    }

    public function getChartAssistiveContent(): string
    {
        return 'Grafik garis menampilkan jumlah formulir screening per bulan selama enam bulan terakhir, dengan garis biru untuk laki-laki dan garis merah muda untuk perempuan.';
    }
}
