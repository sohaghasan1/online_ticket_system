@extends('dashboard.layout.app')

@section('content')

    <div class="row p-5">
        <div class="col-md-12 m-auto">
            <h2>Order Lists</h2>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">From</th>
            <th scope="col">To</th>
            <th scope="col">Date & Time</th>
            <th scope="col">Seat</th>
            <th scope="col">Total</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
            <tr>
            <th scope="row">{{$order->id}}</th>
            <td>{{$order->user->name}}</td>
            <td>{{$order->user->email}}</td>
           
            <td>{{$order->trip->departureLocation->name}}</td>
            <td>{{$order->trip->apartureLocation->name}}</td>
            <td>{{$order->trip->departure_at}}</td>
            <td>{{$order->seat_number}}</td>
            <td>{{$order->amount}}</td>
            <td>
                <div class="btn-group">
                    <a href="" class="btn btn-sm btn-warning">Approve</a>
                    <a href="" class="btn btn-sm btn-danger">Delete</a>
                </div>
            </td>
            </tr>

            @empty

            <tr>

                <td colspan="3" class="text-center"><a href="{{route('locations.create')}}" class="btn btn-primary" >Add Location</a></td>

            </tr>
           @endforelse
        </tbody>
        </table>
        </div>
    </div>

  
@endsection