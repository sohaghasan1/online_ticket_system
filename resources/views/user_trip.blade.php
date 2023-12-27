
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
        <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="{{url('/')}}">TripShare</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
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
      <h1 class="text-light mt-5">Customer Information</h1>
      @if(session()->has('message'))
        <div class="my-2 py-2">
            <p class="text-info bg-light">{{session('message')}}</p>
        </div>
      @endif
      <form action="{{route('store.user_trip')}}" method="POST" class="mt-5">
        @csrf
        <input type="hidden" name="trip_id" value="{{$trip->id}}">
        <div class="row">
            <div class="col-md-6">
                <input type="text" placeholder="User Name" name="name" class="form-control mb-3">
                @error('name')
                    <p class="text-danger">{{$message}}</p>
                @enderror

                <input type="email" placeholder="User Email" name="email" class="form-control mb-3">
                @error('email')
                    <p class="text-danger">{{$message}}</p>
                @enderror

                <input type="password" placeholder="Password" name="password" class="form-control mb-3">
                @error('password')
                    <p class="text-danger">{{$message}}</p>
                @enderror

                <input type="password" placeholder="Confirm Password" name="password_confirmation" class="form-control mb-3">

               <input type="number" id="seatNumber" placeholder="Seat Number" name="seat_number" class="form-control mb-3" max="{{$trip->bus->available_seat}}">
                @error('seat_number')
                    <p>{{$message}}</p>
                @enderror
            </div>


            <div class="col-md-6 bg-light">
                <h4>Details:</h4>
                <p>Bus Name: {{$trip->bus->name}}</p>
                <p>Bus Type: {{$trip->bus->class}}</p>
                <p>Bus Type: {{$trip->bus->quality}}</p>
                <p>From: {{$trip->departureLocation->name}}</p>
                <p>To: {{$trip->apartureLocation->name}}</p>
                <p>Date & Time: {{$trip->departure_at}}</p>
                <input type="hidden" name="amount" id="fare" value="{{$trip->fare}}">
                <p>Fare on Each Seat: {{$trip->fare}}</p>
                <p id="totalFare"></p>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
            <input type="submit" class="btn btn-warning">
            </div>
        </div>
       
      </form>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


    <!-- Add this script tag in the head or at the end of your HTML body -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var seatNumberInput = document.getElementById('seatNumber');
        var fareInput = document.getElementById('fare');
        var totalFareElement = document.getElementById('totalFare');
        seatNumberInput.addEventListener('input', function () {
            var seatNumber = seatNumberInput.value;
            var fare = fareInput.value;
            if (!isNaN(seatNumber) && !isNaN(fare)) {
                var totalFare = seatNumber * fare;
                totalFareElement.textContent = 'Total Fare: ' + totalFare.toFixed(2);
            } else {
                totalFareElement.textContent = 'Invalid input';
            }
        });
    });
</script>



  </body>
</html>