<x-filament-widgets::widget>
    <x-filament::section>
        <x-exporter :columns="$this->getPageTableRecords()->all()" title="Software"/>
    </x-filament::section>
</x-filament-widgets::widget>
