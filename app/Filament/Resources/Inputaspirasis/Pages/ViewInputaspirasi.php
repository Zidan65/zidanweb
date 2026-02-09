<?php

namespace App\Filament\Resources\Inputaspirasis\Pages;

use App\Filament\Resources\Inputaspirasis\InputaspirasiResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewInputaspirasi extends ViewRecord
{
    protected static string $resource = InputaspirasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
