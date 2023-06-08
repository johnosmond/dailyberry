<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Flavors List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-fixed w-full mb-6">
                        <thead>
                            <tr>
                                <th class="w-1/4 px-4 py-2"><a href="{{ route('flavors.index') . '?sort=flavor' . $dirstr }}">Flavor</a></th>
                                <th class="w-1/2 px-4 py-2">Description</th>
                                <th class="w-1/4 px-4 py-2"><a href="{{ route('flavors.index') . '?sort=times_used' . $dirstr }}"># Used</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($flavors as $flavor)
                                <tr>
                                    <td class="border px-4 py-2">{{ $flavor->flavor }}</td>
                                    <td class="border px-4 py-2">{{ $flavor->description }}</td>
                                    <td class="border px-4 py-2">{{ $flavor->times_used }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($flavors instanceof \Illuminate\Pagination\LengthAwarePaginator)
                        {{ $flavors->appends(request()->input())->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
