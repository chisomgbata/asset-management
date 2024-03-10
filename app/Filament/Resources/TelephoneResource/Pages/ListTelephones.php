<?php

namespace App\Filament\Resources\TelephoneResource\Pages;

use App\Filament\Resources\TelephoneResource;
use Filament\Actions;
use Filament\Pages\Concerns\ExposesTableToWidgets;
use Filament\Resources\Pages\ListRecords;

class ListTelephones extends ListRecords
{
    use ExposesTableToWidgets;

    protected static string $resource = TelephoneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            TelephoneResource\Widgets\TelephoneExporter::class

        ];
    }
}
