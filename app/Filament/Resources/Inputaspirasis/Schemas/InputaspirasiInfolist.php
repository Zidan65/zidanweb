<?php

namespace App\Filament\Resources\Inputaspirasis\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class InputaspirasiInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nis'),
                TextEntry::make('id_kategori')
                    ->numeric(),
                TextEntry::make('lokasi'),
                TextEntry::make('keterangan'),
                TextEntry::make('feedback')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
