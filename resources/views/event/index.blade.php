<x-app-layout>
    <div class="m-40">
        <h2 class="pb-10">Events</h2>
        <div class="grid grid-cols-2 gridr-rows-1 gap-x-8">
            <ul class="max-w-md divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($events as $event)
                    <li class="pb-3 sm:pb-4">
                        <button hx-get="{{ 'event/' . $event->id }}" hx-target="#evt-viewer" hx-swap="innerHTML">
                            <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">{{$event->triggerer->valve_id}}</p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">{{$event->time}}</p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                {{$event->type}}
                            </div>
                        </button>
                    </li>
                @endforeach
            </ul>
            <x-card>
                <x-slot:title>
                    Event viewer
                </x-slot:title>
                <div id="evt-viewer">
                    <p class="text-xl text-center">Select an event to start</p>
                </div>
            </x-card>
        </div>
    </div>
</x-app-layout>
