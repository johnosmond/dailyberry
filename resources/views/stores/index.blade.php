<x-app-layout>
    <x-slot name="header">
        {{ __('Stores List') }}
    </x-slot>
    <div class="pt-2">
        <div class="max-w-7xl mx-auto px-0 sm:px-2 md:px-4 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg pb-3">
                <div class="px-0 sm:px-2 md:px-4 lg:px-8 text-gray-900 dark:text-gray-100">
                    <table class="table-fixed w-full mb-6">
                        <thead>
                            <tr class="text-gray-500">
                                <th class="w-[30%] px-4 py-2 md:w-[20%]">Store</th>
                                <th class="w-[50%] px-4 py-2"><span
                                        class="text-base md:text-lg font-bold">Address</span></th>
                                <th class="w-[20%] px-4 py-2 hidden md:table-cell">Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stores as $store)
                                <tr class="odd:bg-gray-100 dark:odd:bg-gray-600">
                                    <td class="update_record text-sm md:text-base border px-4 py-2" data-name="store"
                                        data-type="text" data-pk="{{ $store->id }}">
                                        {{ $store->store }}
                                    </td>
                                    <td class="update_record text-sm md:text-base border px-4 py-2"
                                        data-name="address" data-type="text" data-pk="{{ $store->id }}">
                                        {{ $store->address }}
                                    </td>
                                    <td class="update_record text-sm md:text-base border px-4 py-2 hidden md:table-cell"
                                    data-name="phone" data-type="text" data-pk="{{ $store->id }}">
                                        {{ $store->phone }}
                                    </td>
                                    <td class="border content-center">
                                        <div class="flex content-center justify-center">
                                            <a href="{{ route('stores.edit', ['store' => $store]) }}"
                                                class="btn btn-primary">
                                                <i class="fa-regular fa-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="scripts">
        <script>
        </script>
    </x-slot>
</x-app-layout>
