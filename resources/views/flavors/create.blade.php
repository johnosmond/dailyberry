<x-app-layout>
    <x-slot name="header">
        {{ __('Create New Flavor') }}
    </x-slot>
    <div class="pt-4">
        <div class="main-level-1">
            <div class="main-level-2">
                <div class="main-level-3">
                    <form method="POST" action="{{ route('flavors.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="flavor"
                                class="block text-gray-700 dark:text-gray-100 text-sm font-bold mb-2">Flavor</label>
                            <input type="text" id="flavor" name="flavor" class="input" value="{{ old('flavor') }}">
                            @error('flavor')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description"
                                class="block text-gray-700 dark:text-gray-100 text-sm font-bold mb-2">Description</label>
                            <textarea type="text" id="description" name="description" class="input">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex justify-normal">
                            <button type="submit"
                                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
