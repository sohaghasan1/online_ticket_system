@extends('dashboard.layout.app')

@section('content')

    <div class="row p-5">
        <div class="col-md-12">
        <div>
        <a href="{{route('trips.create')}}" class="btn btn-primary">Add a new Trip</a>
        </div>
        <table class="table mt-3">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Departure At</th>
            <th scope="col">Departure From</th>
            <th scope="col">Aparture To</th>
            <th scope="col">Bus</th>
            <th scope="col">Fare</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($trips as $trip)
            <tr>
            <th scope="row">{{$trip->id}}</th>
            <td>{{$trip->departure_at}}</td>
            <td>{{$trip->departureLocation->name}}</td>
            <td>{{$trip->apartureLocation->name}}</td> 
            <td>{{$trip->bus->name}}</td>
            <td>{{$trip->fare}}</td>

            <td>
                <div class="btn-group">
                    <a href="{{route('trips.edit', $trip->id)}}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="" class="btn btn-sm btn-danger">Delete</a>
                </div>
            </td>
            </tr>

            @empty

            <tr>

                <td colspan="7" class="text-center"><a href="{{route('trips.create')}}" class="btn btn-primary" >Add a new Trip</a></td>

            </tr>
           @endforelse
        </tbody>
        </table>
        </div>
    </div>

  
@endsection