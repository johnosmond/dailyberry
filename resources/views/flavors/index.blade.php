<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Flavors List') }}
        </h2>
    </x-slot>

    <div class="pt-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="GET" action="{{ route('flavors.index') }}" class="mb-4 flex items-center space-x-2">
                <input class="input" type="text" name="flavor" placeholder="Search by Flavor"
                    value="{{ request('flavor') }}" />
                <button class="btn" type="submit">Search</button>
                <div class="w-1/2"><a href="{{ route('flavors.index') }}">clear search</a></div>
            </form>
        </div>
    </div>
    <div class="pt-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-fixed w-full mb-6">
                        <thead>
                            <tr>
                                <th class="w-[20%] px-4 py-2 text-xl font-bold"><a
                                        href="{{ route('flavors.index') . '?sort=flavor' . $dirstr }}">Flavor</a></th>
                                <th class="w-[70%] px-4 py-2 text-xl font-bold">Description</th>
                                <th class="w-[10%] px-4 py-2 font-bold hidden md:table-cell"><a
                                        href="{{ route('flavors.index') . '?sort=times_used' . $dirstr }}"># <span class="hidden lg:inline-block">Used</span></a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($flavors as $flavor)
                                <tr class="odd:bg-gray-100">
                                    <td class="border px-4 py-2">{{ $flavor->flavor }}</td>
                                    <td class="border px-4 py-2">{{ $flavor->description }}</td>
                                    <td class="border px-4 py-2 hidden md:table-cell">{{ $flavor->times_used }}</td>
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
