<x-filament-widgets::widget>
    <x-filament::section>
        <x-exporter :columns="$this->getPageTableQuery()->get()" :title="$title"/>
    </x-filament::section>
</x-filament-widgets::widget>
