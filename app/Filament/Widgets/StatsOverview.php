<?php

namespace App\Filament\Widgets;

use App\Models\Hardware;
use App\Models\Server;
use App\Models\Software;
use App\Models\Telephone;
use App\Models\Workstation;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = null;


    protected function getStats(): array
    {
        return [
            Stat::make('Workstations', Workstation::count()),
            Stat::make('Servers', Server::count()),
            Stat::make('Hardware', Hardware::count()),
            Stat::make('Software', Software::count()),
            Stat::make('Telephone', Telephone::count()),

        ];
    }
}
