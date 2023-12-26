@extends('dashboard.layout.app')

@section('content')

    <div class="row p-5">
        <div class="col-md-6">
        <div>
        <a href="{{route('locations.create')}}" class="btn btn-primary">Add Location</a>
        </div>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($locations as $location)
            <tr>
            <th scope="row">{{$location->id}}</th>
            <td>{{$location->name}}</td>
            <td>
                <div class="btn-group">
                    <a href="{{route('locations.edit', $location->id)}}" class="btn btn-sm btn-warning">Edit</a>
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