<?php

namespace App\Filament\Pages;

use App\Filament\Resources\InsomniaScreenings\InsomniaScreeningResource;
use App\Filament\Resources\ScreeningQuestions\ScreeningQuestionResource;
use Filament\Actions\Action;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;

class Dashboard extends BaseDashboard
{
    protected static ?string $title = 'Ringkasan Insomnia';

    protected static ?string $navigationLabel = 'Dashboard';

    public function getSubheading(): string|Htmlable|null
    {
        return 'Pantau aktivitas screening dan data peserta dalam satu tempat. Ringkasan ini bersifat edukatif, bukan diagnosis.';
    }

    public function getPageClasses(): array
    {
        return ['fi-admin-dashboard'];
    }

    public function getColumns(): int|array
    {
        return [
            'default' => 1,
            'md' => 2,
            'xl' => 4,
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('manageQuestions')
                ->label('Kelola pertanyaan')
                ->icon(Heroicon::OutlinedQuestionMarkCircle)
                ->color('gray')
                ->url(ScreeningQuestionResource::getUrl('index')),
            Action::make('manageScreenings')
                ->label('Kelola data screening')
                ->icon(Heroicon::OutlinedClipboardDocumentCheck)
                ->url(InsomniaScreeningResource::getUrl('index')),
        ];
    }
}
