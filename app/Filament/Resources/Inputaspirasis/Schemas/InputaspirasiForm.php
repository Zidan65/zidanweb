<?php

namespace App\Filament\Resources\Inputaspirasis\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class InputaspirasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nis')
                    ->required(),
                Select::make('id_kategori')
                    ->relationship('kategori','nama_kategori')
                    ->label('Kategori')
                    ->required(),
                TextInput::make('lokasi')
                    ->required(),
                TextInput::make('keterangan')
                    ->required(),
                FileUpload::make('foto')
                    ->label('Foto')
                    ->image()
                    ->disk('public')
                    ->directory('foto-aspirasi')
                    ->imagePreviewHeight('150')
                    ->maxSize(2048) 
                    ->required(false),
            ]);
    }
}
