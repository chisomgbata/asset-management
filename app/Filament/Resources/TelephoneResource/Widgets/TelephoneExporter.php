<?php

namespace App\Filament\Resources\TelephoneResource\Widgets;

use App\Filament\Resources\TelephoneResource\Pages\ListTelephones;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\Widget;

class TelephoneExporter extends Widget
{
    use InteractsWithPageTable;

    protected function getTablePage(): string
    {
        return ListTelephones::class;
    }

    protected static string $view = 'filament.resources.telephone-resource.widgets.telephone-exporter';
}
