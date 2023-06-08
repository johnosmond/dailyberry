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
        $sort = $request->query('sort');
        $dir = $request->query('dir');
        $dirstr = '&dir=asc';

        if (isset($sort)) {
            if (isset($dir)) {
                $flavors = Flavor::orderBy($sort, $dir)->paginate(10);
                $dirstr = ($dir == 'asc') ? '&dir=desc' : '&dir=asc';
            } else {
                $flavors = Flavor::orderBy($sort)->paginate(10);
            }
        } else {
            $flavors = Flavor::orderBy('flavor')->paginate(10);
        }

        $data = [
            'flavors' => $flavors,
            'dirstr' => $dirstr
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
