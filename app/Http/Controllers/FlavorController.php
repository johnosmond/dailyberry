<?php

namespace App\Http\Controllers;

use App\Models\Flavor;
use Illuminate\Http\Request;

class FlavorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
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
    public function create()
    {
        return view('flavors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Flavor $flavor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Flavor $flavor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Flavor $flavor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flavor $flavor)
    {
        //
    }
}
