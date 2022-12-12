<!DOCTYPE html>
<html>
<head>
	<title>Displaying All Payment Detail</title>
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

<style type="text/css">
		/*body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}*/
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 850px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
	</style>
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
                                <a class="nav-link" href="http://127.0.0.1:8000/user/hotelView">Hotel</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://127.0.0.1:8000/user/roomView">Room</a>
                            </li>
                            <li class="nav-item">
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
        
<br/>
<br/>
	<h1>Your Booking Details</h1>

	@if (session('status'))
    <div class="alert alert-success" >
        {{ session('status') }}
    </div>
    @endif
<br>
	<table class="data-table">
		<caption class="title"></caption>
		<thead>
			<tr>
				<th>Booked Date </th>
				<th>Hotel Name</th>
				<th>Room Number </th>
				<th>Total Amount</th>
				<th>Card Number</th>
				<th>Card Type</th>
				<th>Owner Name</th>
				<th>Booked From</th>
				<th>Booked To</th>
				<th>User Name</th>

				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
		
		@foreach($payments as $payment)
			    <tr>    
			      <td>{{$payment->created_at}}</td>
			      <td>
			      	<?php foreach($hotels as $hotel){
	                  if($payment->hotel_id==$hotel->id){

				      echo $hotel->hotel_name;
	                   }}
	                  ?>
			      </td>
			      <td>
			      	<?php foreach($rooms as $room){
	                  if($payment->room_id==$room->id){

				      echo $room->room_number;
	                   }}
	                  ?>
			      </td> 
  				  <td>Rs {{$payment->pay_amount}}.00</td>
			      <td>{{$payment->card_number}}</td>
			      <td>{{$payment->card_type}}</td>
			      <td>{{$payment->first_name}}</td>
			      <td>{{$payment->booked_from}}</td>
			      <td>{{$payment->booked_to}}</td>
			      <td>
			      	<?php foreach($users as $user){
	                  if($payment->user_id==$user->id){

				      echo $user->name;
	                   }}
	                  ?>
			      </td>

              	   <td> 
	                  	<a  href="/delete/{{$payment->id }}">
	                  		<button type="button"  class="btn btn-danger">
	                  		Delete
	                  		</button>
	                  	</a>
              	  </td>
			    </tr>
		@endforeach

		</tbody>
	
	</table>

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