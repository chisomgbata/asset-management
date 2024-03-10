<?php

namespace App\Filament\Resources\HardwareResource\Pages;

use App\Filament\Resources\HardwareResource;
use Filament\Actions;
use Filament\Pages\Concerns\ExposesTableToWidgets;
use Filament\Resources\Pages\ListRecords;

class ListHardware extends ListRecords
{
    use ExposesTableToWidgets;

    protected static string $resource = HardwareResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            HardwareResource\Widgets\HardwareExporter::class
        ];
    }


}
