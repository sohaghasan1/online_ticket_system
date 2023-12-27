@extends('dashboard.layout.app')

@section('content')

    <div class="row p-5">
        <div class="col-md-6">

            <form action="{{route('locations.update', $location->id)}}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" placeholder="Location Name" name="name" class="form-control mb-3" value="{{$location->name}}">
                @error('name')
                    <p>{{$message}}</p>
                @enderror
                <input type="submit" class="btn btn-info" value="Update Location">
            </form>

        </div>
    </div>

  
@endsection