<?php

namespace App\Http\Controllers;

use App\Http\Requests\TripStoreRequest;
use App\Models\Bus;
use App\Models\Location;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trips = Trip::with('departureLocation', 'apartureLocation', 'bus')->get();
        return view('dashboard.pages.trips.index', compact('trips'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = Location::all();
        $buses = Bus::all();
        return view('dashboard.pages.trips.create', compact('locations', 'buses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TripStoreRequest $request)
    {
       $departure_at = $request->departure_date . ' ' . $request->departure_time;
       Trip::create(
        [
            'departure_at' => $departure_at,
            'departure_location_id' => $request->departure_location_id,
            'apertaure_location_id' => $request->apertaure_location_id,
            'bus_id' => $request->bus_id,
            'fare' => $request->fare,
        ]

        );
        return redirect()->route('trips.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Trip $trip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trip $trip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trip $trip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trip $trip)
    {
        //
    }
}
