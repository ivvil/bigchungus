<x-app-layout>
    <div class="flex justify-between">
        <h2>Zones</h2>
        <button class="bg-green border-4 boder-black" href="/new">NEW ZONE</button>
    </div>
    <div class="flex flex-wrap gap-3">
        @foreach ($zones as $zone)
            <x-card-simpl :title="$zone->title" :body="$zone->description" />
        @endforeach
    </div>
</x-app-layout>
