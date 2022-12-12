<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Hotel;
use App\Payment;
use DB;
use DateTime;
use Carbon\Carbon;
class PaymentController extends Controller
{
   
   
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function paymentRegister_post(Request $request)
    {
        
        $inputs = $request->input();

        $pay_amount = $inputs["pay_amount"];
        $hotel_id = $inputs["hotel_id"];
        $room_id = $inputs["room_id"];
        $user_id = $inputs["user_id"];
        
        $payment = new Payment();
        $payment->pay_amount = $pay_amount;
        $payment->hotel_id = $hotel_id;
        $payment->room_id = $room_id;
        $payment->user_id = $user_id;

        $result = $payment->save();

        if ($result)
        {
           return redirect('user/paymentView');
           //return redirect('/hotel/hotelView')->with('status', 'Hotel  Successfully Added!');
        } 
        else 
        {
           return redirect('user/roomView');
        }
    }

      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show()
    {
        $payments = DB::table('payments')->get();
        $hotels = DB::table('hotels')->get();
        $rooms = DB::table('rooms')->get();
        return view('/user/payView',compact('payments','hotels','rooms'));
    }

    public function showAdmin()
    {
        $payments = DB::table('payments')->get();
        $hotels = DB::table('hotels')->get();
        $rooms = DB::table('rooms')->get();
        $users = DB::table('users')->get();
        return view('/payment/paymentView',compact('payments','hotels','rooms','users'));
    }
    

    public function showUser()
    {
        $rooms = DB::table('rooms')->get();
        $hotels = DB::table('hotels')->get();
        $payments =Payment::latest()->get();   
        
        return view('user/paymentView',compact('payments','hotels','rooms'));
    }

    public function paymentUpdate_post($id,Request $request)
    {
        $payments=Payment::findOrFail($id );
        if($payments)
        {
          
          $date_from=date_create($request->booked_from);
          $date_to=date_create($request->booked_to);
          $diffInDays=date_diff($date_from,$date_to);
          $total=$diffInDays->format("%a");
         
          $total_amount = ($request->pay_amount) * $total;
          $payments->pay_amount=$total_amount;
          $payments->booked_from=$request->booked_from;
          $payments->booked_to=$request->booked_to;

          $payments->card_number=$request->card_number;
          $payments->card_type=$request->card_type;
          $payments->expiry_date=$request->expiry_date;
          $payments->security_code=$request->security_code;
          $payments->first_name=$request->first_name;
          $payments->last_name=$request->last_name;

          $payments->hotel_id=$request->hotel_id;
          $payments->room_id=$request->room_id;
          $payments->user_id=$request->user_id;
         
        }
         $payments->save();
         return redirect('/user/payView')->with('status', 'Room  Successfully Booked!');
    }

 public function delete($id)
    {
         $data = Payment::find($id);
        $data->delete();
        return redirect('/payment/paymentView')->with('status', 'Payment Detail Deleted Successfully!');
    }
  
}

