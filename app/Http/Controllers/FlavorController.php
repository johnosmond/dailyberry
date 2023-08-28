<?php

namespace App\Http\Controllers;

use App\Models\Flavor;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class FlavorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $flavor = $request->input('flavor');
        $display_count = $request->input('display_count', "10");

        // new
        $sort = $request->query('sort', 'flavor');
        $dir = $request->query('dir', 'asc');
        $dirstr = $dir == 'asc' ? '&dir=desc' : '&dir=asc';

        $flavors = $this->applyFiltersAndSort($flavor, $sort, $dir, $display_count);

        $data = [
            'flavors' => $flavors,
            'dirstr' => $dirstr,
            'display_count' => $display_count
        ];

        return view('flavors.index')->with($data);
    }

    private function applyFiltersAndSort($flavor, $sort, $dir, $display_count)
    {
        $query = Flavor::flavor($flavor)->sort($sort, $dir);
        return $display_count == 'all' ? $query->get() : $query->paginate($display_count);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('flavors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $rules = [
            'flavor' => 'required|unique:flavors|string|max:255',
            'description' => 'nullable|string',
        ];

        $messages = [
            'flavor.required' => 'Flavor is a required field.',
            'flavor.unique' => 'That flavor is already in the list.'
        ];

        $validatedData = $request->validate($rules, $messages);

        $flavor = Flavor::create($validatedData);

        return redirect()->route('flavors.show', ['flavor' => $flavor])
            ->with('success', 'Flavor was added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Flavor $flavor): View
    {
        return view('flavors.show', ['flavor' => $flavor]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Flavor $flavor): View
    {
        return view('flavors.edit', ['flavor' => $flavor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Flavor $flavor): RedirectResponse
    {
        $rules = [
            'flavor' => 'required|string|max:255|unique:flavors,flavor,' . $flavor->id,
            'description' => 'nullable|string',
        ];

        $messages = [
            'flavor.required' => 'Flavor is a required field.',
            'flavor.unique' => 'That flavor is already in the list.',
        ];

        $validated = $request->validate($rules, $messages);

        $flavor->update([
            'flavor' => $validated['flavor'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('flavors.show', ['flavor' => $flavor])
            ->with('success', 'Flavor was updated successfully.');
    }

    public function updateByAjax(Request $request): JsonResponse
    {
        if ($request->ajax()) {
            Flavor::find($request->pk)->update([
                $request->name => $request->value
            ]);
            return response()->json(['success' => true]);
        }
    }

    public function deleteByAjax(Request $request): JsonResponse
    {
        echo ('test');
        if ($request->ajax()) {
            // Flavor::find($request->pk)->delete();
            dd($request);
            return response()->json(['success' => true]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flavor $flavor): RedirectResponse
    {
        $flavor->delete();
        return redirect()->route('flavors.index')
            ->with('success', 'Flavor was deleted successfully.');
    }
}
