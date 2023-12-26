@extends('dashboard.layout.app')

@section('content')

    <div class="row p-5">
        <div class="col-md-6">

            <form action="{{route('locations.store')}}" method="POST">
                @csrf

                <input type="text" placeholder="Location Name" name="name" class="form-control mb-3">
                @error('name')
                    <p>{{$message}}</p>
                @enderror
                <input type="submit" value="Add Location">
            </form>

        </div>
    </div>

  
@endsection