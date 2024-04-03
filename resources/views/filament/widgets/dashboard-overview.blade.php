<x-filament-widgets::widget>

    <div class="grid md:grid-cols-3 gap-6 ">
        @foreach($stats as $stat)
            <div
                class="fi-wi-stats-overview-stat relative rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
                <dt class="truncate text-sm font-medium text-gray-500">{{$stat['title']}}</dt>
                <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{$stat['value']}}</dd>
                @if(!!$stat['url'])
                    <a href="{{ $stat['url'] }}"
                       class="absolute inset-0 z-10 cursor-pointer"
                       aria-hidden="true"></a>
                @endif
            </div>
        @endforeach
    </div>


</x-filament-widgets::widget>
