<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\SeatAllocation;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Http\Request;

class UserTripController extends Controller
{
    public function search(Request $request){
        $this->validate($request, [
            'departure_location_id' => 'required',
            'apertaure_location_id' => 'required',
            'departure_date' => 'required',
        ]);
    
        $trips = Trip::with('bus')->where('departure_location_id',$request->departure_location_id)
            ->where('apertaure_location_id', $request->apertaure_location_id)
            ->whereDate('departure_at',$request->departure_date)
            ->get();

        return view('bus', compact('trips'));

    }

    public function selectTrip($id){
        $trip = Trip::with('bus')->where('id',$id)->first();
        if(!$trip){
            return redirect()->back()-with('error', 'Trip not found');
        }
        return view('user_trip', compact('trip'));

    }

    public function storeTrip(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $trip = Trip::with('bus')->where('id',$request->trip_id)->first();
        if(!$trip){
            return redirect()->back()-with('message', 'Trip not found');
        }

        if($trip->bus->available_seat < $request->seat_number){
            return redirect()->back()-with('message', 'Unavailable seat');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        SeatAllocation::create([
            'user_id' => $user->id,
            'trip_id' => $request->trip_id,
            'seat_number' => $request->seat_number,
            'amount' => $request->amount * $request->seat_number
        ]);
        Bus::where('id',$trip->bus_id)->update([
            'available_seat' => ($trip->bus->available_seat - $request->seat_number)
        ]);

        return redirect()->back()->with('message', 'Thank You! Your Order done successfully');
        
    }
}
