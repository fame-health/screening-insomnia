<?php

namespace App\Filament\Widgets;

use App\Models\InsomniaScreening;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AdminOverview extends StatsOverviewWidget
{
    protected ?string $heading = 'Ringkasan peserta';

    protected ?string $description = 'Jumlah ini menggambarkan data screening yang masuk, bukan prevalensi diagnosis.';

    protected ?string $pollingInterval = null;

    protected function getStats(): array
    {
        $total = InsomniaScreening::query()->count();
        $male = InsomniaScreening::query()->where('gender', 'Laki-laki')->count();
        $female = InsomniaScreening::query()->where('gender', 'Perempuan')->count();
        $thisMonth = InsomniaScreening::query()
            ->whereBetween('created_at', [now()->startOfMonth(), now()])
            ->count();
        $monthNames = [1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'];

        return [
            Stat::make('Total peserta', number_format($total))
                ->description('Seluruh hasil screening tersimpan')
                ->color('primary'),
            Stat::make('Laki-laki', number_format($male))
                ->description($total > 0 ? number_format(($male / $total) * 100, 1).'% dari peserta' : 'Belum ada data')
                ->color('info'),
            Stat::make('Perempuan', number_format($female))
                ->description($total > 0 ? number_format(($female / $total) * 100, 1).'% dari peserta' : 'Belum ada data')
                ->color('danger'),
            Stat::make('Screening bulan ini', number_format($thisMonth))
                ->description($monthNames[(int) now()->format('n')].' '.now()->format('Y'))
                ->color('success'),
        ];
    }
}
