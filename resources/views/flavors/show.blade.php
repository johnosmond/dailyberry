<x-app-layout>
    <x-slot name="header">
        {{ __($flavor->flavor) }}
    </x-slot>
    <div class="pt-4">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <h1 class="dark:text-gray-100">{{ $flavor->flavor }}</h1>
            <p class="dark:text-gray-100">{{ $flavor->description }}</p>
        </div>
    </div>
</x-app-layout>
