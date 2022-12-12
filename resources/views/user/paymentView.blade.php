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
   
   <!--  <link rel="stylesheet" type="text/css" href="{{asset("bootstrap/css/bootstrap.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset("bootstrap/css/bootstrap.min.css")}}"> -->
 <link rel="stylesheet" type="text/css" href="{{asset("bootstrap/css/style.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset("bootstrap/css/style1.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset("bootstrap/css/style2.css")}}">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

        <!-- Fonts -->
       <!--  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> -->

        <!-- Styles -->
        <style>
        
            #diva{
               max-width: 1200px;
               height: 1150px;
               background-color: lightgrey;
                border: 1px solid black;
                padding: 20px;
                margin: 20px;
            }
            
#para{
width:400px;
left:200px;
display:inline-block;
}
#diva2{
   
    max-width: 1200px;
   height: 430px;
   background-color: lightgrey;
    border: 1px solid black;
    padding: 15px;
    margin: 15px;
    text-align: center
}
#inthu{
	float:left;
}
label > input{ 
  visibility: hidden; 
  position: absolute; 
}
label > input + img{ 
  cursor:pointer;
  border:2px solid transparent;
}
label > input:checked + img{ 
  border:5px solid green;
}

#thana{
	text-align:center;
	float:center;
    width: 1220px;
   height: 1000px;
   background-color: #99ff99;
    border: 5px solid black;
    padding: 25px;
    margin: 25px;
}

        </style>
    <script type="text/javascript">

function calling()
{
	alert("Now checking your detail");
}

function clr()
{
document.getElementById("x").innerHTML="";
document.getElementById("a").value="";
document.getElementById("b").value="";
document.getElementById("c").value="";
}

</script>
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
    @foreach($payments->all() as $payment)
           @if($loop->first)
               {{Form::model($payments, array('route' => array('paymentUpdate_post', $payment->id)))}}
            @endif
          @endforeach
        

         @csrf                                                                         
<div id="diva2">
          @foreach($payments->all() as $payment)
           @if($loop->first)
              @foreach ($hotels as $hotel) 
                                    @if(($hotel->id)==($payment->hotel_id))                                   <h1>{{$hotel->hotel_name}} Room Details</h1>
                                    <input type="hidden"  name="hotel_id" value="{{$hotel->id }}" />
                                    @endif
              @endforeach
            @endif
          @endforeach
  
	<br>
	
<label>
  <img class="img-thumbnail" alt="Cinque Terre" src="{{url('/bootstrap/image/hotel1.jpg')}}" width="250px" height="200px">
</label>

<label>
  <img class="img-thumbnail" alt="Cinque Terre" src="{{url('/bootstrap/image/room1.jpg')}}" width="250px" height="200px">
</label>

<label>
  <img class="img-thumbnail" alt="Cinque Terre" src="{{url('/bootstrap/image/hotel.jpg')}}" width="250px" height="200px">
</label>

<label>
  <img class="img-thumbnail" alt="Cinque Terre" src="{{url('/bootstrap/image/room.jpg')}}" width="250px" height="200px">
</label>

<br>
<br>
 @foreach($payments->all() as $payment)
           @if($loop->first)
              @foreach ($rooms as $room) 
                                    @if(($room->id)==($payment->room_id))                                   <h3>{{$room->room_number}}</h3>
                                           <h2><div style="color:green" >Rs. {{$room->room_rent}}.00 Per Day</div><h2>
                                            <input type="hidden"  name="room_id" value="{{$room->id }}" />
                                             <input type="hidden"  name="pay_amount" value="{{$room->room_rent}}" />
                                    @endif
              @endforeach
            @endif
          @endforeach

</div>

<br>
 
<h4 style="color:black;text-align:center;">Thank You! Please Pay Now To Complete Your Booking.</h4>
<br>
<h4 style="color:black;text-align:center;">Pay With</h4>



<div id="diva">  

    <p class="h4 mb-4">PAYMENT</p>

         <label for="booked_from">Booked From </label>
          <input type="date"  name="booked_from"   class="form-control mb-4"  required/>
            <label for="booked_to">Booked To</label>
          <input type="date"  name="booked_to"   class="form-control mb-4"  required/>

            <br><br>
<label>
  <img  src="{{url('/bootstrap/image/card1.jpg')}}" width="150px" height="100px">
</label>

<label>
  <img src="{{url('/bootstrap/image/card2.jpg')}}" width="150px" height="100px">
</label>

<label>
  <img src="{{url('/bootstrap/image/card3.jpg')}}" width="150px" height="100px">
</label>

<label>
  <img src="{{url('/bootstrap/image/card4.jpg')}}" width="150px" height="100px">
</label>

<label>
  <img src="{{url('/bootstrap/image/card5.jpg')}}" width="150px" height="100px">
</label>

<br><br>

         
           <label for="card_number">Card Number</label>
          <input type="number"  name="card_number"   class="form-control mb-4"  required/>

           <label for="card_type">Card Type</label>
          <select name="card_type"  class="form-control mb-4"  required>
          <option value="Debit Card">Debit Card</option>
          <option value="Credit Card">Credit Card</option>
          <option value="Visa Card">Visa Card</option>
          <option value="PayPal">PayPal </option>
          </select>


            <label for="expiry_date">Expiration Date</label>
          <input type="date"  name="expiry_date"   class="form-control mb-4"  required/>

          <label for="security_code">Security Code</label>
          <input type="number"  name="security_code"   class="form-control mb-4"  required/>

            <label for="first_name">First Name</label>
          <input type="text"  name="first_name"   class="form-control mb-4"  required/>

            <label for="last_name">Last Name</label>
          <input type="text"  name="last_name"   class="form-control mb-4"  required/>

  
          <input type="hidden"  name="user_id" value="{{ Auth::user()->id }}" class="form-control mb-4">
</br>
		<input type="submit" value="Confirm And Pay" class="btn btn-info btn-sm float-right">
    <a type="button" class="btn btn-primary btn-sm float-left" href="http://127.0.0.1:8000/user/paymentView">Cancel</a>
    
</div>
{{ Form::close() }}




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

