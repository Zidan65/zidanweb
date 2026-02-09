<?php

namespace App\Filament\Resources\Aspirasis\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AspirasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                  Select::make('status')
                    ->options(['Menunggu' => 'Menunggu', 'Proses' => 'Proses', 'Selesai' => 'Selesai'])
                    ->default('Menunggu')
                    ->required(),
                TextInput::make('feedback')
                    ->label('Feedback')
                    ->required(),
                Select::make('id_kategori')
                    ->relationship('kategori','nama_kategori')
                    ->label('Kategori')
                    ->required(),
               
            ]);
    }
}
