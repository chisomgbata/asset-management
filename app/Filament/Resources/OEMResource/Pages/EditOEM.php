<?php

namespace App\Filament\Resources\OEMResource\Pages;

use App\Filament\Resources\OEMResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOEM extends EditRecord
{
    protected static string $resource = OEMResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
