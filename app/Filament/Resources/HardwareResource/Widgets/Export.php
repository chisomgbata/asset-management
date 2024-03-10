<?php

namespace App\Filament\Resources\HardwareResource\Widgets;

use App\Filament\Resources\HardwareResource\Pages\ListHardware;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\Widget;

class Export extends Widget
{
    use InteractsWithPageTable, HasWidgetShield;


    protected static string $view = 'filament.resources.hardware-resource.widgets.export';

    public function __construct(public string $title = 'Export')
    {
    }


    protected function getTablePage(): string
    {
        return ListHardware::class;
    }


}
