<?php

namespace App\Filament\Resources\SoftwareResource\Widgets;

use App\Filament\Resources\HardwareResource\Pages\ListHardware;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\Widget;

class SoftwareExporter extends Widget
{
    use InteractsWithPageTable;

    protected static string $view = 'filament.resources.software-resource.widgets.software-exporter';

    protected function getTablePage(): string
    {
        return ListHardware::class;
    }
}
