<x-app-layout>
    <x-slot name="header">
        {{ __('Create New Flavor') }}
    </x-slot>
    <div class="pt-4">
        <div class="max-w-4xl mx-auto px-2 sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('flavors.store') }}">
                @csrf

                <div class="mb-4">
                    <label for="flavor" class="block text-gray-700 dark:text-gray-100 text-sm font-bold mb-2">Flavor</label>
                    <input type="text" id="flavor" name="flavor"
                        class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 dark:text-gray-100 text-sm font-bold mb-2">Description</label>
                    <textarea type="text" id="description" name="description"
                        class="w-full px-3 py-2 h-32 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300"></textarea>
                </div>

                <div class="flex justify-normal">
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Create</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
