<?php

namespace App\Filament\Resources\SoftwareResource\Pages;

use App\Filament\Resources\SoftwareExporterResource\Widgets\SoftwareExporter;
use App\Filament\Resources\SoftwareResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSoftware extends ListRecords
{
    protected static string $resource = SoftwareResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [SoftwareExporter::class];
    }


}
