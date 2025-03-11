<x-app-layout>
    <div class="m-20">
        <h2 class="pb-12">Add a zone</h2>
        <form action="{{ route('zones.store') }}" method="post">
            @csrf
            <label for="name">Name:</label><br />
            <input type="text" name="name"><br />

            <label for="description">Description:</label><br />
            <input name="description" type="text"><br />

            <label for="valves[]">Valves:</label><br />
            <select name="valves[]" multiple>
                @foreach ($valves as $valve)
                    <option value="{{ $valve->valve_id }}">{{ $valve->valve_id }}</option>
                @endforeach
            </select><br />

            <input type="submit" class="bg-green border-4 boder-black p-2 pointer-events-auto">
        </form>
    </div>
</x-app-layout>
