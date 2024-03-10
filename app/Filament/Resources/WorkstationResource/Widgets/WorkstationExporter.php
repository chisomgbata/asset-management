<?php

namespace App\Filament\Resources\WorkstationResource\Widgets;

use App\Filament\Resources\WorkstationResource\Pages\ListWorkstations;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\Widget;

class WorkstationExporter extends Widget
{
    use InteractsWithPageTable;

    protected function getTablePage(): string
    {
        return ListWorkstations::class;
    }

    protected static string $view = 'filament.resources.workstation-resource.widgets.workstation-exporter';
}
