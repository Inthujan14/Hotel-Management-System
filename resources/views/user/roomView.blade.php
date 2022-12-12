<!DOCTYPE html>
<html>
<head>
    <title>USER DASHBOARD</title>
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

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 44px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            #diva{
                float: left;
              width: 325px;
               height: 430px;
               background-color: lightgrey;
                border: 2px solid black;
                padding: 20px;
                margin: 20px;
            }
      


#shana2:hover {
    content : url('/bootstrap/image/room1.jpg');
}
        </style>
    
</head> 
<body>
<div class="container">

  <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
   <div class="collapse navbar-collapse" >
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="http://127.0.0.1:8000/home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://127.0.0.1:8000/user/hotelView">Hotel</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://127.0.0.1:8000/room/roomView">Room</a>
                            </li>
                            <li class="nav-item">
              <!--                   @if(Auth::user()->usertype == "admin")
    
@endif -->
                             <a class="nav-link" href="http://127.0.0.1:8000/user/payView">Payment</a>   
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
            <div class="content">
                <form  method="post" action="{{ url("paymentRegister_post") }}">
               @csrf
                <div class="title m-b-md">
                     
                @foreach($rooms->all() as $room)
                            @if($loop->first)
                                @foreach ($hotels as $hotel) 
                                    @if(($hotel->id)==($room->hotel_id))
                                       
                                            <h1>{{$hotel->hotel_name}} Room Details</h1>
                                            <input type="hidden"  name="hotel_id" value="{{$hotel->id }}" />
                                    @endif
                                @endforeach
                            @endif
                @endforeach

                             
                </div>

                <table >
                <tr>
                <td >
                   

                    @foreach($rooms as $room)
                  
                <div id="diva">
                  <img id="shana2" class="img-thumbnail" alt="Cinque Terre" src="{{url('/bootstrap/image/room.jpg')}}"  width="290px" height="220px">
                  <div style="color:black">{{$room->room_number}} </div> 
                  <div>{{$room->room_type}} </div> 
                  <div style="color:black">Rent : {{$room->room_rent}}.00 Per Day</div>
                  <div>Available : {{$room->available}} </div> 

                  @if($room->available == "No")
                  <div style="color:black">Booked From : {{$room->room_from}}</div>
                  <div>Booked To : {{$room->room_to}} </div> <br>
                    @endif
                    <br>
                    
                   @if($room->available == "Yes")
                      <input type="hidden"  name="room_id" value="{{$room->id }}" />
                      <input type="hidden"  name="pay_amount" value="{{$room->room_rent }}" />
                      <input type="submit" value="Book" class="btn btn-info btn-sm btn-block">
                   @endif

                
                </div>
                @endforeach

                </td> 
                </tr>
                </table> 

                    <input type="hidden"  name="user_id" value="{{ Auth::user()->id }}" />
                                                                                                 
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

