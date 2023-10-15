<x-guest-layout>
    <x-slot name="header">
        {{ __('Welcome to The Daily Berry') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="columns-2 md:columns-4">
                <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <i class="fa fa-address-book" aria-hidden="true"></i>
                        {{ __('Storesxx') }}
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg mt-4">
                    <a href="{{ route('flavors.index') }}">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <i class="fa fa-address-book" aria-hidden="true"></i>
                            {{ __('Flavors') }}
                        </div>
                    </a>
                </div>
                <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <i class="fa fa-address-book" aria-hidden="true"></i>
                        {{ __('Calendar') }}
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg mt-4">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <i class="fa fa-address-book" aria-hidden="true"></i>
                        {{ __('Users') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>