<x-app-layout>
    <div class="m-20">
        <div class="flex justify-between">
            <h2 class="pb-10">Zones</h2>
            <button class="bg-green border-4 boder-black p-1 h-10" href="/new"><a href="{{route('zones.create')}}">NEW ZONE</a></button>
        </div>
        <div class="flex flex-wrap gap-3">
            @foreach ($zones as $zone)
                <x-card-simpl :title="$zone->name" :body="$zone->description" />
            @endforeach
        </div>
    </div>
</x-app-layout>
