<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="py-12">
        <div class="flex justify-center max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="max-w-xs bg-white dark:bg-gray-800 shadow-sm rounded-lg border">
                    <a href="{{ route('flavors.index') }}">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <i class="fa-regular fa-address-book" aria-hidden="true"></i>
                            {{ __('Flavors List') }}
                        </div>
                    </a>
                </div>
                <div class="max-w-xs bg-white dark:bg-gray-800 shadow-sm rounded-lg border">
                    <a href="{{ route('calendars.index') }}">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <i class="fa-regular fa-calendar" aria-hidden="true"></i>
                            {{ __('Calendars') }}
                        </div>
                    </a>
                </div>
                <div class="max-w-xs bg-white dark:bg-gray-800 shadow-sm rounded-lg border">
                    <a href="{{ route('specials.index') }}">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <i class="fa-solid fa-bowl-food" aria-hidden="true"></i>
                            {{ __('Specials') }}
                        </div>
                    </a>
                </div>
                <div class="max-w-xs bg-white dark:bg-gray-800 shadow-sm rounded-lg border">
                    <a href="{{ route('stores.index') }}">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <i class="fa-solid fa-store" aria-hidden="true"></i>
                            {{ __('Stores') }}
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
