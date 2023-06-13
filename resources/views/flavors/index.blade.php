<x-app-layout>
    <x-slot name="header">
        {{ __('Flavors List') }}
    </x-slot>
    <div class="pt-4">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <form name="frmSearch" id="frmSearch" method="GET" action="{{ route('flavors.index') }}">
                <div class="flex gap-2 md:gap-4">
                    <div class="w-full md:w-1/2">
                        <input class="input" type="text" name="flavor" id="flavor" placeholder="Search by Flavor"
                            value="{{ request('flavor') }}" />
                    </div>
                    <div class="">
                        <button class="btn" type="submit">Search</button>
                    </div>
                    <div class="">
                        <button id="btnClear" class="btn" type="button" onclick="clearFlavor()">Clear</button>
                    </div>
                    <div class="md:w-1/2 text-right pr-2 md:pr-10">
                        <label for="display_count" class="text-gray-400 hidden md:inline-block">Display:</label>
                        <select name="display_count" id="display_count" class="select" value="{{ $display_count }}"
                            onchange="submitAfterDisplayChange()">
                            <option value="10" {{ $display_count == '10' ? 'selected' : '' }}>10</option>
                            <option value="20" {{ $display_count == '20' ? 'selected' : '' }}>20</option>
                            <option value="50" {{ $display_count == '50' ? 'selected' : '' }}>50</option>
                            <option value="all" {{ $display_count == 'all' ? 'selected' : '' }}>(All)</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="pt-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="px-6 text-gray-900 dark:text-gray-100" style="padding-bottom: 3rem;">
                    <table class="table-fixed w-full mb-6">
                        <thead>
                            <tr class="text-gray-500">
                                <th class="w-[30%] px-4 py-2 md:w-[20%]"><a
                                        href="{{ route('flavors.index') . '?sort=flavor' . $dirstr }}"
                                        class="text-base md:text-lg font-bold">Flavor</a></th>
                                <th class="w-[70%] px-4 py-2"><span
                                        class="text-base md:text-lg font-bold">Description</span></th>
                                <th class="w-[10%] px-4 py-2 hidden md:table-cell"><a
                                        href="{{ route('flavors.index') . '?sort=times_used' . $dirstr }}"
                                        class="text-base md:text-lg font-bold"># <span
                                            class="hidden lg:inline-block">Used</span></a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($flavors as $flavor)
                                <tr class="odd:bg-gray-100">
                                    <td class="update_record text-sm md:text-base border px-4 py-2" data-name="flavor"
                                        data-type="text" data-pk="{{ $flavor->id }}" data-title="Enter Flavor" data-class="testclass">
                                        {{ $flavor->flavor }}</td>
                                    <td class="update_record text-sm md:text-base border px-4 py-2"
                                        data-name="description" data-type="text" data-pk="{{ $flavor->id }}"
                                        data-title="Enter Description">
                                        {{ $flavor->description }}</td>
                                    <td class="text-sm md:text-base border px-4 py-2 hidden md:table-cell">
                                        {{ $flavor->times_used }}</td>
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
    <x-slot name="scripts">
        <script type="text/javascript">
            function clearFlavor() {
                document.getElementById('flavor').value = "";
                document.getElementById('frmSearch').submit();
            }

            function submitAfterDisplayChange() {
                document.getElementById('frmSearch').submit();
            }
            $.fn.editable.defaults.mode = 'inline';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            $('.update_record').editable({
                url: "{{ route('flavor.update') }}",
                type: 'text',
                inputclass: 'w-full',
                emptytext: ''
            });
        </script>
    </x-slot>
</x-app-layout>
