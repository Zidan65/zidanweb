<?php

namespace App\Filament\Widgets;

use App\Models\Aspirasi;
use App\Models\User;
use Filament\Facades\Filament;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class Dashboard extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah Admin',User::where('role','admin')->count()),
            Stat::make('Jumlah Siswa',User::where('role','siswa')->count()),
            Stat::make('Jumlah Aspirasi masuk',Aspirasi::count()),
        ];
    }

    public static function canView(): bool
    {
        return Filament::auth()->user()->role === 'admin';
    }
}
