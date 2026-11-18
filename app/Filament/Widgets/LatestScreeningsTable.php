<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\InsomniaScreenings\InsomniaScreeningResource;
use App\Models\InsomniaScreening;
use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class LatestScreeningsTable extends TableWidget
{
    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(InsomniaScreening::query())
            ->heading('Data screening terbaru')
            ->description('Data peserta yang baru masuk. Buka pengelolaan data untuk melihat jawaban lengkap.')
            ->columns([
                TextColumn::make('participant_name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('age')
                    ->label('Umur')
                    ->suffix(' th')
                    ->sortable(),
                TextColumn::make('gender')
                    ->label('Jenis kelamin')
                    ->badge()
                    ->color(fn (string $state): string => $state === 'Perempuan' ? 'danger' : 'info'),
                TextColumn::make('instrument')
                    ->label('Jenis screening')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => $state === 'medis' ? 'Masalah medis' : 'Screening remaja'),
                TextColumn::make('score')
                    ->label('Skor / 100')
                    ->numeric(decimalPlaces: 2)
                    ->sortable(),
                TextColumn::make('result_label')
                    ->label('Ringkasan')
                    ->limit(42)
                    ->tooltip(fn (InsomniaScreening $record): string => $record->result_label),
                TextColumn::make('created_at')
                    ->label('Waktu')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->headerActions([
                Action::make('manageScreenings')
                    ->label('Kelola semua data')
                    ->icon('heroicon-m-arrow-top-right-on-square')
                    ->url(InsomniaScreeningResource::getUrl('index'))
                    ->color('primary'),
            ])
            ->defaultSort('created_at', 'desc')
            ->paginated([5, 10, 25])
            ->defaultPaginationPageOption(5)
            ->emptyStateHeading('Belum ada data screening')
            ->emptyStateDescription('Data akan muncul setelah peserta mengisi salah satu formulir screening.');
    }
}
