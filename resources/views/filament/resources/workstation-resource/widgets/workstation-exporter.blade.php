<x-filament-widgets::widget>
    <x-filament::section>
        <x-exporter :columns="$this->getPageTableRecords()->all()" title="Workstation"/>
    </x-filament::section>
</x-filament-widgets::widget>
