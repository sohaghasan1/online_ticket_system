@extends('dashboard.layout.app')

@section('content')

    <div class="row p-5">
        <div class="col-md-6">

            <form action="{{route('buses.store')}}" method="POST">
                @csrf

                <input type="text" placeholder="Bus Name" name="name" class="form-control mb-3">
                @error('name')
                    <p>{{$message}}</p>
                @enderror

                <select name="quality" class="form-control mb-3" id="">
                    <option value="" disabled selected>Select Bus Quality</option>
                    <option value="AC">AC</option>
                    <option value="Non AC">Non AC</option>
                </select>

                @error('quality')
                    <p>{{$message}}</p>
                @enderror

                <select name="class" class="form-control mb-3" id="">
                    <option value="" disabled selected>Select Bus Class</option>
                    <option value="Business">Business</option>
                    <option value="Economy">Economy</option>
                </select>

                @error('class')
                    <p>{{$message}}</p>
                @enderror

                <input type="number" class="form-control mb-3" name="seat_number" placeholder="Seat Number">

                @error('seat_number')
                    <p>{{$message}}</p>
                @enderror



                <input type="submit" value="Add Bus">
            </form>

        </div>
    </div>

  
@endsection