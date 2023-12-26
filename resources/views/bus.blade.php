
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body class="bg" style="background-color:khaki">

    <div class="container">
        <div class="row">
        <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{url('/')}}">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

            @if (Route::has('login'))
                
                    @auth
                        <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin') }}">Dashboard</a>
                    </li>
                    @else
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Log in</a>
                    </li>
               
                    @if (Route::has('register'))
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                          
                        @endif
                    @endauth
                
            @endif
               
              
              
            </ul>
            </div>
        </div>
        </nav>
        </div>
    </div>

    <div class="container">
      <h1>Available Bus</h1>
        <div class="row">
            <div class="col-md-12">
               
                    @if(session()->has('error'))
                    <div class="py-4 my-4">
                        <p class="alert bg-danger">{{session('error')}}</p>
                    </div>
                    @endif

               
            <table class="table">
            <thead>
                <tr>
                <th scope="col">Departure At</th>
                <th scope="col">Bus</th>
                <th scope="col">Available Seat</th>
                <th scope="col">class</th>
                <th scope="col">Quality</th>
                <th scope="col">Fare</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($trips as $trip)
                <tr>
                    <td>{{$trip->departure_at}}</td>
                    
                    <td>{{$trip->bus->name}}</td>
                    <td>{{$trip->bus->available_seat}} ({{$trip->bus->seat_number}})</td>
                    <td>{{$trip->bus->class}}</td>
                    <td>{{$trip->bus->quality}}</td>
                    <td>{{$trip->fare}}</td>
                    <td>
                        <a href="{{route('select.trip', $trip->id)}}" class="btn btn-warning btn-sm">Choose</a>
                    </td>
                </tr>

                @empty

                <tr>
                    <td colspan="6" class="text-danger text-center">No Available bus</td>
                </tr>

                @endforelse
            
             
            </tbody>
            </table>
            </div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>