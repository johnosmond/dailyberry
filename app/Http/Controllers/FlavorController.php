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

        $sort = $request->query('sort');
        $dir = $request->query('dir');
        $dirstr = '&dir=asc'; // default

        if (isset($sort)) {
            if (isset($dir)) {
                if ($display_count == 'all') {
                    $flavors = Flavor::when($flavor, fn ($query, $flavor) => $query->flavor($flavor))->orderBy($sort, $dir)->get();
                } else {
                    $flavors = Flavor::when($flavor, fn ($query, $flavor) => $query->flavor($flavor))->orderBy($sort, $dir)->paginate($display_count);
                }
                $dirstr = ($dir == 'asc') ? '&dir=desc' : '&dir=asc';
            } else {
                if ($display_count == 'all') {
                    $flavors = Flavor::when($flavor, fn ($query, $flavor) => $query->flavor($flavor))->orderBy($sort)->get();
                } else {
                    $flavors = Flavor::when($flavor, fn ($query, $flavor) => $query->flavor($flavor))->orderBy($sort)->paginate($display_count);
                }
            }
        } else {
            if ($display_count == 'all') {
                $flavors = Flavor::when($flavor, fn ($query, $flavor) => $query->flavor($flavor))->orderBy('flavor')->get();
            } else {
                $flavors = Flavor::when($flavor, fn ($query, $flavor) => $query->flavor($flavor))->orderBy('flavor')->paginate($display_count);
            }
        }

        $data = [
            'flavors' => $flavors,
            'dirstr' => $dirstr,
            'display_count' => $display_count
        ];

        return view('flavors.index')->with($data);
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
        $validatedData = $request->validate([
            'flavor' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $flavor = Flavor::create($validatedData);

        return redirect()->route('flavors.show', ['flavor' => $flavor])
            ->with('success', 'Flavor was updated successfully.');
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
        $validated = $request->validate([
            'flavor' => 'required|max:255',
            'description' => 'nullable|string',
        ]);

        $flavor->update([
            'flavor' => $validated['flavor'],
            'description' => $validated['description'] ?? $flavor->description,
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
