<?php

namespace App\Filament\Resources\ServerExporterResource\Widgets;

use App\Filament\Resources\ServerResource\Pages\ListServers;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\Widget;

class ServerExporter extends Widget
{
    use InteractsWithPageTable;

    protected function getTablePage(): string
    {
        return ListServers::class;
    }

    protected static string $view = 'filament.resources.server-exporter-resource.widgets.server-exporter';
}
