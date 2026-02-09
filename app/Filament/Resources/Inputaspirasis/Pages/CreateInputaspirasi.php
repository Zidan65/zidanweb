<?php

namespace App\Filament\Resources\Inputaspirasis\Pages;

use App\Filament\Resources\Inputaspirasis\InputaspirasiResource;
use Filament\Resources\Pages\CreateRecord;

class CreateInputaspirasi extends CreateRecord
{
    protected static string $resource = InputaspirasiResource::class;

       public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
