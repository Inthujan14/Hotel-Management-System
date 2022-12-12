<!DOCTYPE html>
<html>
<head>
	<title>HOTEL UPDATE PAGE</title>
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
   
        <div class="text-center border border-light p-5">
{{Form::model($hotels, array('route' => array('hotelUpdate_post', $hotels->id)))}}

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

    <p class="h4 mb-4">HOTEL UPDATE</p>


         <label for="hotel_name">Hotel Name</label>
          <input type="text"  name="hotel_name" value="{{ $hotels->hotel_name }}"   class="form-control mb-4"  required/>

          <label for="hotel_address">Address</label><br/>
          <textarea id="hotel_address" name="hotel_address" rows="6" cols="140" required>{{ $hotels->hotel_address }}</textarea>

          <label for="hotel_type">Hotel Type</label>
          <select name="hotel_type" id="hotel_type" value="{{ $hotels->hotel_type }}" class="form-control mb-4"  required>
          <option value="One Star">One Star</option>
          <option value="Two Star">Two Star</option>
          <option value="Three Star">Three Star</option>
          <option value="Four Star">Four Star</option>
          <option value="Five Star">Five Star</option>
          </select>

          <input type="hidden"  name="user_id" value="{{ Auth::user()->id }}" class="form-control mb-4">
</br></br>
		<input type="submit" value="Update" class="btn btn-info btn-sm float-right">
    <a type="button" class="btn btn-primary btn-sm float-left" href="http://127.0.0.1:8000/hotel/hotelView">Cancel</a>
{{ Form::close() }}
    </div></div>
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

