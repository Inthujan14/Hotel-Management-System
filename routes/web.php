<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function(){
    return view('welcome');
});


Auth::routes();

Route::post('reset_password_without_token', 'AccountsController@validatePasswordRequest');
Route::post('reset_password_with_token', 'AccountsController@resetPassword');

Route::get('/home', 'HomeController@index')->name('home');

//Admin

Route::group(['middleware' => ['auth','admin']],function(){

   Route::get('/dashboard',function(){
    return view('admin.dashboard'); 
});

   // Hotel Register Routes

Route::get('/hotel/hotelRegister', 'HotelController@hotelRegister');

Route::post('/hotelRegister_post', 'HotelController@hotelRegister_post');

// Display Hotel

Route::get('/hotel/hotelView', 'HotelController@show');
Route::get('hotel/hotelEmail', 'HotelController@email');

//Update Hotel
Route::get('/hotel/hotelUpdate/{id}', 'HotelController@hotelUpdate')->name('hotelUpdate');

Route::post('/hotelUpdate_post/{id}', 'HotelController@hotelUpdate_post')->name('hotelUpdate_post');

// Delete Hotel

 Route::get('/delete/{id}','HotelController@delete');

 // Room Register Routes

Route::get('/room/roomRegister', 'RoomController@roomRegister');

Route::get('/paypal/payment', 'RoomController@paypalRegister');

Route::post('/roomRegister_post', 'RoomController@roomRegister_post');

// Display Room

Route::get('/room/roomView', 'RoomController@show');

//Update Room
Route::get('/room/roomUpdate/{id}', 'RoomController@roomUpdate')->name('roomUpdate');

Route::post('/roomUpdate_post/{id}', 'RoomController@roomUpdate_post')->name('roomUpdate_post');

// Delete Room

 Route::get('/delete/{id}','RoomController@delete');

 // Display Payment All Detail 

Route::get('/payment/paymentView', 'PaymentController@showAdmin');

// Delete Payment  Detail

 Route::get('/delete/{id}','PaymentController@delete');

   
});

// User

// Display Hotel

Route::get('/user/hotelView', 'HotelController@showUser');

// Display Room

Route::get('/user/roomView/{id}', 'RoomController@showUser');

// Register Payment
Route::post('/paymentRegister_post', 'PaymentController@paymentRegister_post');

// Display Payment
Route::get('/user/paymentView', 'PaymentController@showUser');

// Update Payment
Route::post('/paymentUpdate_post/{id}', 'PaymentController@paymentUpdate_post')->name('paymentUpdate_post');

// Display Payment All Detail

Route::get('/user/payView', 'PaymentController@show');

Route::get('/login-activity', 'LoginActivityController@index')->middleware('auth');


