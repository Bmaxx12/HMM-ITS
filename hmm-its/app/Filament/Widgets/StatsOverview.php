<?php

namespace App\Filament\Widgets;

use App\Models\CabinetMember;
use App\Models\CabinetUnit;
use App\Models\Post;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Artikel', Post::count())
                ->description('Total berita yang telah dibuat')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('primary'),
            Stat::make('Total Anggota Kabinet', CabinetMember::count())
                ->description('Total anggota aktif')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),
            Stat::make('Total Divisi/Unit', CabinetUnit::count())
                ->description('Total struktur unit kabinet')
                ->descriptionIcon('heroicon-m-building-office')
                ->color('info'),
        ];
    }
}
