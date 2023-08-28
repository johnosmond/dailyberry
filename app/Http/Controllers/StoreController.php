<?php

namespace App\Http\Controllers;

use App\Models\FlavorDate;
use App\Models\Store;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Carbon\Carbon;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $stores = Store::all();
        return view('stores.index', ['stores' => $stores]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        $months = [
            1 => 'January', 2 => 'February', 3 => 'March',
            4 => 'April', 5 => 'May', 6 => 'June',
            7 => 'July', 8 => 'August', 9 => 'September',
            10 => 'October', 11 => 'November', 12 => 'December',
        ];
        $currentYear = date('Y');
        $years = [$currentYear, $currentYear + 1, $currentYear + 2];

        $selectedMonth = request()->input('month', date('n'));
        $selectedYear = request()->input('year', date('Y'));

        $firstDayOfMonth = Carbon::create($selectedYear, $selectedMonth, 1);
        $daysInMonth = $firstDayOfMonth->daysInMonth;

        $daysList = [];
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $daysList[] = $firstDayOfMonth->copy()->day($day);
        }

        $flavorDates = [];
        foreach ($daysList as $day) {
            $flavorDate = FlavorDate::whereDate('flavor_date', $day)->first();
            if ($flavorDate) {
                $flavor = $flavorDate->flavor->flavor;
            } else {
                $flavor = '';
            }
            $flavorDates[$day->format('Y-m-d')] = $flavor;
        }

        return view('stores.edit', compact('store', 'months', 'years', 'flavorDates', 'daysList'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Flavor $flavor): View
    {
        return view('flavors.show', ['flavor' => $flavor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Store $store)
    {
        //
    }
}
