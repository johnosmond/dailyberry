<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="columns-4">
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <i class="fa fa-address-book" aria-hidden="true"></i>
                        {{ __('Stores') }}
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                    <a href="{{ route('flavors.index') }}">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <i class="fa fa-address-book" aria-hidden="true"></i>
                            {{ __('Flavors') }}
                        </div>
                    </a>
                </div>
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <i class="fa fa-address-book" aria-hidden="true"></i>
                        {{ __('Calenar') }}
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <i class="fa fa-address-book" aria-hidden="true"></i>
                        {{ __('Users') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
