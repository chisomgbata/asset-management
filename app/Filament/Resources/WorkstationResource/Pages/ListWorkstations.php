<?php

namespace App\Filament\Resources\WorkstationResource\Pages;

use App\Filament\Resources\WorkstationResource;
use Filament\Actions;
use Filament\Pages\Concerns\ExposesTableToWidgets;
use Filament\Resources\Pages\ListRecords;

class ListWorkstations extends ListRecords
{
    use ExposesTableToWidgets;

    protected static string $resource = WorkstationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            WorkstationResource\Widgets\WorkstationExporter::class
        ];
    }
}
