<?php

namespace App\Filament\Resources\HardwareResource\Widgets;

use App\Filament\Resources\HardwareResource\Pages\ListHardware;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\Widget;

class HardwareExporter extends Widget
{
    use InteractsWithPageTable;

    protected function getTablePage(): string
    {
        return ListHardware::class;
    }

    protected static string $view = 'filament.resources.hardware-resource.widgets.hardware-exporter';

}
