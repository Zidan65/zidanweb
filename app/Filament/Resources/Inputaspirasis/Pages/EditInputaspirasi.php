<?php

namespace App\Filament\Resources\Inputaspirasis\Pages;

use App\Filament\Resources\Inputaspirasis\InputaspirasiResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditInputaspirasi extends EditRecord
{
    protected static string $resource = InputaspirasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }

    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
