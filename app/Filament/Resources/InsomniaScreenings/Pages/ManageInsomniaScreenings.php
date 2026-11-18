<?php

namespace App\Filament\Resources\InsomniaScreenings\Pages;

use App\Filament\Resources\InsomniaScreenings\InsomniaScreeningResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageInsomniaScreenings extends ManageRecords
{
    protected static string $resource = InsomniaScreeningResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
