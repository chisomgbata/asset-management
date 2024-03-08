<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = null;
    protected function getStats(): array
    {
        return [
            Stat::make('Assets', '19'),
            Stat::make('Components', '21'),
            Stat::make('Maintenance', '3'),
            Stat::make('Employees', '5'),
        ];
    }
}
