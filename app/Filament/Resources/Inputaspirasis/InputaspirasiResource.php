<?php

namespace App\Filament\Resources\Inputaspirasis;

use App\Filament\Resources\Inputaspirasis\Pages\CreateInputaspirasi;
use App\Filament\Resources\Inputaspirasis\Pages\EditInputaspirasi;
use App\Filament\Resources\Inputaspirasis\Pages\ListInputaspirasis;
use App\Filament\Resources\Inputaspirasis\Pages\ViewInputaspirasi;
use App\Filament\Resources\Inputaspirasis\Schemas\InputaspirasiForm;
use App\Filament\Resources\Inputaspirasis\Schemas\InputaspirasiInfolist;
use App\Filament\Resources\Inputaspirasis\Tables\InputaspirasisTable;
use App\Models\Inputaspirasi;
use BackedEnum;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class InputaspirasiResource extends Resource
{
    protected static ?string $model = Inputaspirasi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static ?string $recordTitleAttribute = 'Inputaspirasi';

    public static function form(Schema $schema): Schema
    {
        return InputaspirasiForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return InputaspirasiInfolist::configure($schema);
    }

    public static function canAccess(): bool
    {
        $user = Filament::auth()->user();
        return $user && $user->role === 'siswa';
    }

    public static function canEdit(Model $record): bool
    {
        $user = Filament::auth()->user();

    return $user?->role === 'admin'
        || $record->status === 'Menunggu';
    }

    public static function table(Table $table): Table
    {
        return InputaspirasisTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListInputaspirasis::route('/'),
            'create' => CreateInputaspirasi::route('/create'),
            'view' => ViewInputaspirasi::route('/{record}'),
            'edit' => EditInputaspirasi::route('/{record}/edit'),
        ];
    }
}
