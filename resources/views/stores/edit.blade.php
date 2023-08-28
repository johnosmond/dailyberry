<x-app-layout>
    <x-slot name="header">
        {{ __($store->store) }}
    </x-slot>
    <div class="p-6">
        <div class="max-w-7xl mx-auto px-0 sm:px-2 md:px-4 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg pb-3">
                <div class="py-6 px-0 sm:px-2 md:px-4 lg:px-8 text-gray-700 dark:text-gray-500">
                    <h2>Flavors for the month:</h2>
                    <div>

                    </div>
                    <select name="month">
                        @foreach ($months as $key => $month)
                            <option value="{{ $key }}" {{ date('n') == $key ? 'selected' : '' }}>
                                {{ $month }}
                            </option>
                        @endforeach
                    </select>
                    <select name="years">
                        @foreach ($years as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>
                    <div class="calendar-grid">
                        @foreach ($daysList as $day)
                            <div class="calendar-day">
                                <span class="calendar-day-number">{{ $day->format('d') }}</span>
                                <input class="" type="text" name="flavors[]"
                                    value="{{ $flavorDates[$day->format('Y-m-d')] }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="scripts">

    </x-slot>

</x-app-layout>
