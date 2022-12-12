<!DOCTYPE html>
<html>
<head>
  <title>ROOM REGISTER PAGE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
   
    <link rel="stylesheet" type="text/css" href="{{asset("bootstrap/css/bootstrap.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset("bootstrap/css/bootstrap.min.css")}}">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head> 
<body>
<div class="container">

  <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
   <div class="collapse navbar-collapse" >
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="http://127.0.0.1:8000/dashboard">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://127.0.0.1:8000/hotel/hotelView">Hotel</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://127.0.0.1:8000/room/roomView">Room</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://127.0.0.1:8000/payment/paymentView">Payment</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">About</a>
                            </li>
                             @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        </ul>
                    </div></nav>
  </div>   


<form class="text-center border border-light p-5" method="post" action="{{ url("roomRegister_post") }}">

@if($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li> {{$error}}</li>
              @endforeach
            </ul>
          </div>
          @endif
          {{ csrf_field() }}  

    <p class="h4 mb-4">ROOM REGISTATION</p>

          <label for="room_number">Room Number</label>
          <input type="text"  name="room_number"   class="form-control mb-4"  required/>

          <label for="room_type">Room Type</label>
          <select name="room_type" id="room_type" class="form-control mb-4"  required>
          <option value="A/C With Attached Bathroom">A/C With Attached Bathroom</option>
          <option value="A/C Without Attached Bathroom">A/C Without Attached Bathroom</option>
          <option value="Non A/C With Attached Bathroom">Non A/C With Attached Bathroom</option>
          <option value="Non A/C Without Attached Bathroom">Non A/C Without Attached Bathroom</option>
          </select>

          <label for="room_rent">Room Rent</label>
          <input type="number"  name="room_rent"   class="form-control mb-4"  required/>

          <label for="available">Available</label>
          </br></br>
          <label for="yes">Yes</label>
          <input type="radio" id="yes" name="available" value="Yes" class="form-control mb-4">
          <label for="no">No</label>
          <input type="radio" id="no" name="available" value="No" class="form-control mb-4">

          <label for="room_from">Booked From</label>
          <input type="date" name="room_from"  class="form-control mb-4" required/>

          <label for="room_to">Booked To</label>
          <input type="date" name="room_to"  class="form-control mb-4" required/>

          <label for="hotel_name">Hotel Name</label>

          <select name="hotel_name"  id="hotel_name"  class="form-control mb-4" size="1" required >
                        <option value="select" disabled selected>--SELECT--</option>

                        @foreach($hotels as $hotel){
                        <option>{{$hotel->hotel_name}}</option>
                        }
                        @endforeach
          </select>

</br></br>

    <input type="submit" value="Submit" class="btn btn-info btn-sm float-right">
    <a type="button" class="btn btn-primary btn-sm float-left" href="http://127.0.0.1:8000/room/roomView">Cancel</a>
    
</form>
    </div>
      <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>
</body>
</html>
