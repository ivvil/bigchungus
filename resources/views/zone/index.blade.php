<x-app-layout>
    <h2>Zones</h2>
    <div class="flex flex-wrap gap-3">
        @foreach($zones as $zone)
            <x-card-simpl :title="$zone->title" :body="$zone->description">
        @endforeach
    </div>
</x-app-layout>
