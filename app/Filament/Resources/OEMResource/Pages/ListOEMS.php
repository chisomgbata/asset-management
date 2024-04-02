<?php

namespace App\Filament\Resources\OEMResource\Pages;

use App\Filament\Resources\OEMResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOEMS extends ListRecords
{
    protected static string $resource = OEMResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
