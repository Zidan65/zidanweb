<?php

namespace App\Filament\Resources\Inputaspirasis\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Facades\Filament;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class InputaspirasisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('No')
                    ->searchable(),
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->disk('public')
                    ->height(50)
                    ->width(50)
                    ->square(),
                TextColumn::make('nis')
                    ->searchable(),
                TextColumn::make('kategori.nama_kategori')
                    ->searchable(),
                TextColumn::make('lokasi')
                    ->searchable(),
                TextColumn::make('keterangan')
                    ->searchable(),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('aspirasi.feedback')
                    ->label('Respon Admin')
                    ->placeholder('Belum Ada Tanggapan'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()
                ->visible(fn ($record) =>
                    Filament::auth()->user()?->role === 'admin'
                    || $record->status === 'Menunggu'
                ),

            DeleteAction::make()
                ->visible(fn () =>
                    Filament::auth()->user()?->role === 'admin'
                ),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    // DeleteBulkAction::make(),
                ]),
            ]);
    }
}
