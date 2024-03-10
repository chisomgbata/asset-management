<?php

namespace App\Filament\Resources\SoftwareExporterResource\Widgets;

use App\Filament\Resources\SoftwareResource\Pages\ListSoftware;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\Widget;

class SoftwareExporter extends Widget
{
    use InteractsWithPageTable;

    protected function getTablePage(): string
    {
        return ListSoftware::class;
    }

    protected static string $view = 'filament.resources.software-exporter-resource.widgets.software-exporter';
}
