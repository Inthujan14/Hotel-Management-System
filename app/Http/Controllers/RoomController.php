<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Hotel;
use DB;

class RoomController extends Controller
{
    public function roomRegister()
    {
        $hotels = Hotel::all();
        return view("room/roomRegister",compact('hotels'));
    }


    public function paypalRegister()
    {
        return view("paypal/product");
    }
   
   
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function roomRegister_post(Request $request)
    {
        $hotel_name=$request->hotel_name;
        $hotels=DB::table('hotels')->where('hotel_name','like',$hotel_name)->first();
        
        $inputs = $request->input();

        $room_number = $inputs["room_number"];
        $room_type = $inputs["room_type"];
        $room_rent = $inputs["room_rent"];
        $available = $inputs["available"];
        $room_from = $inputs["room_from"];
        $room_to = $inputs["room_to"];
        
        $room = new Room();
        $room->room_number = $room_number;
        $room->room_type = $room_type;
        $room->room_rent = $room_rent;
        $room->available = $available;
        $room->room_from = $room_from;
        $room->room_to = $room_to;
        $room->hotel_id = $hotels->id;

        $result = $room->save();

        if ($result)
        {
           return redirect('/room/roomView')->with('status', 'Room Successfully Added!');
        } 
        else 
        {
           return redirect('/room/roomRegister');
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
        
        $rooms = Room::all();
        $hotels=Hotel::all();
        return view('room/roomView',compact('rooms','hotels'));
    }

    public function showUser($id)
    {
        
        //$rooms = Room::all();
        $hotels=Hotel::all();
        //$rooms = DB::table('rooms')->where('name', 'John')->value('email');
        $rooms=Room::where('hotel_id',$id)->get();
        //$hotels->id=$rooms->hotel_id;
        return view('user/roomView',compact('rooms','hotels'));
    }

    public function roomUpdate($id)
    {
        $hotels = Hotel::all();
        $rooms = Room::findOrFail($id);
        return view('room/roomUpdate',compact('rooms','hotels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function roomUpdate_post($id,Request $request)
    {
        $hotel_name=$request->hotel_name;
         $hotels=DB::table('hotels')->where('hotel_name','like',$hotel_name)->first();

        $rooms=Room::findOrFail($id );
        if($rooms)
        {
          $rooms->room_number=$request->room_number;
          $rooms->room_type=$request->room_type;
          $rooms->room_rent=$request->room_rent;
          $rooms->available=$request->available;
          $rooms->room_from=$request->room_from;
          $rooms->room_to=$request->room_to;

          $rooms->hotel_id=$hotels->id;
        }
         $rooms->save();
         return redirect('/room/roomView')->with('status', 'Room Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
         $data = Room::find($id);
        $data->delete();
        return redirect('/room/roomView')->with('status', 'Room Deleted Successfully!');
    }
}
