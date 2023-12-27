
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <style>
      .bg{
        background-image: url("{{asset('img/bus.jpg')}}");
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        position: relative;
        z-index: 0;
      }
      .bg::after{
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: black;
        opacity: .5;
        z-index: -1;
      }
      .header{
          background-color: rgba(0, 0, 0, 0.486) !important;
      }
    </style>
  </head>
  <body class="bg">

  <section class="header">
  <div class="container">
        <div class="row">
        <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid text-light">
            <a class="navbar-brand text-light" href="{{url('/')}}">TripShare</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-light">
                    <li class="nav-item">
                    <a class="nav-link text-light" href="">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-light" href="">Service</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-light" href="">Contact</a>
                    </li>
            @if (Route::has('login'))
                
                    @auth
                    <li class="nav-item">
                    <a class="nav-link text-light" href="{{ url('/admin') }}">Dashboard</a>
                    </li>
                    @else
                    <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('login') }}">Log in</a>
                    </li>
               
                    @if (Route::has('register'))
                        <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('register') }}">Register</a>
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
  </section>

    <div class="container">
      
      <form action="{{route('search.trips')}}">
        
        <div class="row align-items-center" style="min-height: 80vh;">
          <div class="col-md-6">
          <h1 class="text-light mt-5">Make a trip</h1>
            <select name="departure_location_id" id="" class="form-control mb-3">
              <option value="" disabled selected>Choose Departure Location</option>
              @foreach($locations as $location)
              <option value="{{$location->id}}">{{$location->name}}</option>
              @endforeach
            </select>
            @error('departure_location_id')
              <p class="text-danger">{{$message}}</p>
            @enderror

            <select name="apertaure_location_id" id="" class="form-control mb-3">
              <option value="" disabled selected>Choose Aparture Location</option>
              @foreach($locations as $location)
              <option value="{{$location->id}}">{{$location->name}}</option>
              @endforeach
            </select>
            @error('apertaure_location_id')
              <p class="text-danger">{{$message}}</p>
            @enderror

            <input type="date" name="departure_date" class="form-control mb-3">
            @error('departure_date')
              <p class="text-danger">{{$message}}</p>
            @enderror

            <input type="submit" class="btn btn-primary" value="Submit">
          </div>
        </div>
      </form>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>