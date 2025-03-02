<x-app-layout>
    <div class="flex justify-between">
        <h2>Valves</h2>
        <button class="bg-green border-4 boder-black" href="/new">NEW VALVE</button>
    </div>
    <x-desc-list>
        @foreach ($valves as $valve)
        <x-desc-item :id="$valve->valve_id" :expanded="$loop->first">
            <x-slot:title>
                <h3>{{ $valve->valve_id }}</h3>
                <span>{{ $valve->location }}</span>
                <span>{{ $valve->status->label() }}</span>
            </x-slot:title>

            <div>
                <x-dl>
                    <x-dl-item :title="Zones">
                        <a>See zones</a>
                    </x-dl-item>
                    <x-dl-item :title="Events">
                        <a>See events</a>
                    </x-dl-item>
                    <x-dl-item :title="Schedules">
                        <a>See schedules</a>
                    </x-dl-item>1
                </x-dl>
            </div>
        </x-desc-item>
        @endforeach
    </x-desc-list>
</x-app-layout>
