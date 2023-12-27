@extends('dashboard.layout.app')

@section('content')

    <div class="row p-5">
        <div class="col-md-8 m-auto">
        <div>
        <a href="{{route('buses.create')}}" class="btn btn-primary">Add Bus</a>
        </div>
        <table class="table mt-3">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Class</th>
            <th scope="col">Quality</th>
            <th scope="col">Total Seat</th>
            <th scope="col">Available Seat</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($buses as $bus)
            <tr>
            <th scope="row">{{$bus->id}}</th>
            <td>{{$bus->name}}</td>
            <td>{{$bus->class}}</td>
            <td>{{$bus->quality}}</td>
            <td>{{$bus->seat_number}}</td>
            <td>{{$bus->available_seat}}</td>
            <td>
                <div class="btn-group">
                    <a href="" class="btn btn-sm btn-warning">Edit</a>
                    <a href="" class="btn btn-sm btn-danger">Delete</a>
                </div>
            </td>
            </tr>

            @empty

            <tr>

                <td colspan="3" class="text-center"><a href="{{route('buses.create')}}" class="btn btn-primary" >Add Location</a></td>

            </tr>
           @endforelse
        </tbody>
        </table>
        </div>
    </div>

  
@endsection