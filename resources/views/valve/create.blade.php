<x-app-layout>
    <div class="m-20">
        <h2 class="pb-12">Add a valve</h2>
        <form action="{{ route('valve.store') }}" method="post">
            @csrf
            <label for="id">Id:</label><br />
            <input type="text" name="id"><br />

            <label for="location">Location:</label><br />
            <input name="location" type="text"><br />

            <label for="zones">Zones:</label><br />
            <select name="zones[]" multiple>
                @foreach ($zones as $zone)
                <option value="{{ $zone->id }}">{{ $zone->name }}</option>
                @endforeach
            </select><br />

            <input type="submit" class="bg-green border-4 boder-black p-2 pointer-events-auto">
        </form>
    </div>
</x-app-layout>
