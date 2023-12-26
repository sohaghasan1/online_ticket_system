<?php

namespace App\Http\Controllers;

use App\Http\Requests\BusStoreRequest;
use App\Models\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buses = Bus::all();
        return view('dashboard.pages.buses.index', compact('buses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.buses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BusStoreRequest $request)
    {
        Bus::create([
            'name' => $request->name,
            'quality' => $request->quality,
            'class' => $request->class,
            'seat_number' => $request->seat_number,
            'available_seat' =>$request->seat_number
        ]);
        return redirect()->route('buses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bus $bus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bus $bus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bus $bus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bus $bus)
    {
        //
    }
}
