<?php

namespace App\Filament\Resources\ServerResource\Pages;

use App\Filament\Resources\ServerExporterResource\Widgets\ServerExporter;
use App\Filament\Resources\ServerResource;
use Filament\Actions;
use Filament\Pages\Concerns\ExposesTableToWidgets;
use Filament\Resources\Pages\ListRecords;

class ListServers extends ListRecords
{
    use ExposesTableToWidgets;

    protected static string $resource = ServerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            ServerExporter::class
        ];
    }
}
