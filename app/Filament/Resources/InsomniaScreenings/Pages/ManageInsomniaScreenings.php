<?php

namespace App\Filament\Resources\InsomniaScreenings\Pages;

use App\Filament\Resources\InsomniaScreenings\InsomniaScreeningResource;
use App\Services\InsomniaScreeningExport;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;
use Filament\Support\Icons\Heroicon;

class ManageInsomniaScreenings extends ManageRecords
{
    protected static string $resource = InsomniaScreeningResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('downloadExcel')
                ->label('Unduh Excel')
                ->icon(Heroicon::OutlinedArrowDownTray)
                ->color('success')
                ->action(fn () => app(InsomniaScreeningExport::class)->excel()),
            Action::make('downloadPdf')
                ->label('Unduh PDF')
                ->icon(Heroicon::OutlinedDocumentArrowDown)
                ->color('danger')
                ->action(fn () => app(InsomniaScreeningExport::class)->pdf()),
            CreateAction::make(),
        ];
    }
}
