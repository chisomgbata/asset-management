<?php

namespace App\Filament\Widgets;

use App\Models\Hardware;
use App\Models\Server;
use App\Models\Software;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = null;


    protected function getStats(): array
    {
        return [
            Stat::make('Servers', Server::count()),
            Stat::make('Hardware', Hardware::count()),
            Stat::make('Software', Software::count()),

            Stat::make('Software Expires In 30 Days', Software::where([
                ['oem_support_end_date', '<=', now()->addDays(30)],
                ['oem_support_end_date', '>=', now()]
            ])->count()),
            Stat::make('Software Expires In 7 Days', Software::where([
                ['oem_support_end_date', '<=', now()->addDays(7)],
                ['oem_support_end_date', '>=', now()]
            ])->count()),
            Stat::make('Software Expired', Software::where('oem_support_end_date', '<', now())->count()),

            Stat::make('Hardware Expires In 30 Days', Hardware::where([
                ['oem_support_end_date', '<=', now()->addDays(30)],
                ['oem_support_end_date', '>=', now()]
            ])->count()),
            Stat::make('Hardware Expires In 7 Days', Hardware::where([
                ['oem_support_end_date', '<=', now()->addDays(7)],
                ['oem_support_end_date', '>=', now()]
            ])->count()),
            Stat::make('Hardware Expired', Hardware::where('oem_support_end_date', '<', now())->count()),


        ];
    }
}
