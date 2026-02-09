<?php

namespace App\Filament\Resources\Inputaspirasis\Pages;

use App\Filament\Resources\Inputaspirasis\InputaspirasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListInputaspirasis extends ListRecords
{
    protected static string $resource = InputaspirasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

}
