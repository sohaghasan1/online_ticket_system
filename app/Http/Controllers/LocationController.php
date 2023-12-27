<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationStoreRequest;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::all();
        return view('dashboard.pages.locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.locations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationStoreRequest $request)
    {
        Location::create($request->validated());
        return redirect()->route('locations.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $location = Location::where('id',$id)->first();
        return view('dashboard.pages.locations.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|string'
        ]);
        Location::where('id', $id)->update(
            [
                'name' => $request->name,
            ]
        );
        return redirect()->route('locations.index')->with('success', "Location Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $location = Location::find($id);
      $location->delete();
        return redirect()->route('locations.index')->with('success', "Location Deleted");
    }

   
}
