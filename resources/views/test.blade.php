<x-app-layout>
    <div class="space-y-8 p-6 max-w-4xl mx-auto">
        <!--- Default component --->
        <div>
            <h2 class="text-xl mb-2 font-bold">Default Component (info)</h2>
            <x-d-card>
                <x-slot:left>Default left content</x-slot:left>
                <x-slot:right>Default right content</x-slot:right>
            </x-d-card>
        </div>

        <!--- Warning type with default title --->
        <div>
            <h2 class="text-xl mb-2 font-bold">Warning Type</h2>
            <x-d-card type="warning">
                <x-slot:left>Disk space remaining</x-slot:left>
                <x-slot:right>15%</x-slot:right>
            </x-d-card>
        </div>

        <!--- Custom title with error type --->
        <div>
            <h2 class="text-xl mb-2 font-bold">Custom Title</h2>
            <x-d-card type="error">
                <x-slot:title>Critical System Error</x-slot:title>
                <x-slot:left>Status check failed</x-slot:left>
                <x-slot:right><span class="text-red-500">OFFLINE</span></x-slot:right>
            </x-d-card>
        </div>

        <!--- All types demonstration --->
        <div>
            <h2 class="text-xl mb-2 font-bold">All Types</h2>
            <div class="grid gap-4 md:grid-cols-2">
                <x-d-card type="info">
                    <x-slot:left>Information</x-slot:left>
                    <x-slot:right>Details</x-slot:right>
                </x-d-card>

                <x-d-card type="error">
                    <x-slot:left>Error Code</x-slot:left>
                    <x-slot:right>500</x-slot:right>
                </x-d-card>

                <x-d-card type="warning">
                    <x-slot:left>Warning</x-slot:left>
                    <x-slot:right>!</x-slot:right>
                </x-d-card>

                <x-d-card type="ok">
                    <x-slot:left>Status</x-slot:left>
                    <x-slot:right>✓ Operational</x-slot:right>
                </x-d-card>
            </div>
        </div>

        <!--- HTML Content in Slots --->
        <div>
            <h2 class="text-xl mb-2 font-bold">HTML Content</h2>
            <x-d-card type="ok">
                <x-slot:title>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a8 8 0 100 16 8 8 0 000-16zm3.707 6.707l-5 5a1 1 0 01-1.414 0l-2-2a1 1 0 111.414-1.414L8 10.586l4.293-4.293a1 1 0 111.414 1.414z" />
                        </svg>
                        Custom HTML Title
                    </div>
                </x-slot:title>
                <x-slot:left>
                    <ul class="list-disc pl-4">
                        <li>CPU: Normal</li>
                        <li>Memory: Stable</li>
                    </ul>
                </x-slot:left>
                <x-slot:right>
                    <button class="bg-green-500 text-white px-4 py-2 rounded">
                        Refresh
                    </button>
                </x-slot:right>
            </x-d-card>
        </div>
    </div>


</x-app-layout>
