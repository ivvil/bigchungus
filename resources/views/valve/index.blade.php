<x-app-layout>
    <div class="m-20" id="accordion" hx-get="{{ 'valve/' . $first }}" hx-trigger="load delay:100ms" hx-target="#accordion" hx-swap="innerHTML"></div>
</x-app-layout>
