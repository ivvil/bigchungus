<div class="flex justify-between pb-12">
    <h2>Valves</h2>
    <button class="bg-green border-4 boder-black p-2" href="/new">NEW VALVE</button>
</div>
<x-desc-list>
    @foreach ($valves as $valve)
        <x-desc-item id="{{$valve->valve_id}}" expanded="{{$valve->valve_id == $expanded->valve_id}}">
            <x-slot:title>
                <span class="font-extrabold w-[16vw]">{{ $valve->valve_id }}</span>
                <span>{{ $valve->location }}</span>
            </x-slot:title>

            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                <x-dl>
                    <x-dl-item title="Zones">
                        <a>See zones</a>
                    </x-dl-item>
                    <x-dl-item title="Events">
                        <a>See events</a>
                    </x-dl-item>
                    <x-dl-item title="Schedules">
                        <a>See schedules</a>
                    </x-dl-item>
                </x-dl>
            </div>
        </x-desc-item>
    @endforeach
</x-desc-list>
