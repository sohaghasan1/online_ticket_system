@extends('dashboard.layout.app')

@section('content')

    <div class="row p-5">
        <div class="col-md-6">

            <form action="{{route('trips.store')}}" method="POST">
                @csrf

                <input type="date" placeholder="Deaprture Date" name="departure_date" class="form-control mb-3">
                @error('departure_date')
                    <p>{{$message}}</p>
                @enderror

                <input type="time" placeholder="Departure Time" name="departure_time" class="form-control mb-3">
                @error('departure_time')
                    <p>{{$message}}</p>
                @enderror

                <select name="departure_location_id" class="form-control mb-3" id="">
                    <option value="" disabled selected>Choose Departure Location</option>
                    @foreach($locations as $location)
                    <option value="{{$location->id}}" >{{$location->name}}</option>
                    @endforeach
                </select>
                @error('departure_location_id')
                    <p>{{$message}}</p>
                @enderror

                <select name="apertaure_location_id" class="form-control mb-3" id="">
                    <option value="" disabled selected>Choose Aparture Location</option>
                    @foreach($locations as $location)
                    <option value="{{$location->id}}" >{{$location->name}}</option>
                    @endforeach
                </select>
                @error('apertaure_location_id')
                    <p>{{$message}}</p>
                @enderror

                <select name="bus_id" class="form-control mb-3" id="">
                    <option value="" disabled selected>Choose Bus</option>
                    @foreach($buses as $bus)
                    <option value="{{$bus->id}}" >{{$bus->name}} - {{$bus->class}} - {{$bus->quality}}</option>
                    @endforeach
                </select>
                @error('bus_id')
                    <p>{{$message}}</p>
                @enderror

                <input type="text" name="fare" placeholder="Fare" class="form-control mb-3">

                @error('fare')
                    <p>{{$message}}</p>
                @enderror

                <input type="submit" class="btn btn-info" value="Add Trip">
            </form>

        </div>
    </div>

  
@endsection