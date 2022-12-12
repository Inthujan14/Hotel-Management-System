<?php

namespace App\Http\Controllers;
use App\Hotel;
use App\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use TsfCorp\Email\Email;


class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hotelRegister()
    {
        return view("hotel/hotelRegister");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function hotelRegister_post(Request $request)
    {
        $inputs = $request->input();
        $hotel_name = $inputs["hotel_name"];
        $hotel_address = $inputs["hotel_address"];
        $hotel_type = $inputs["hotel_type"];
        $user_id = $inputs["user_id"];
        $hotel = new Hotel();

        $hotel->hotel_name = $hotel_name;
        $hotel->hotel_address = $hotel_address;
        $hotel->hotel_type = $hotel_type;

        $hotel->user_id = $user_id;
       
        $result = $hotel->save();

        if ($result)
        {
           return redirect('/hotel/hotelView')->with('status', 'Hotel  Successfully Added!');
        } 
        else 
        {
           return redirect('/hotel/hotelRegister');
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
        //$formBuilders = FormBuilder::all();
         $hotels = DB::table('hotels')->get();
        return view('/hotel/hotelView',compact('hotels'));
    }
    public function email(){
        $email = (new Email())
    ->to('inthujan332@mail.com')
    ->cc('cc@mail.com')
    ->bcc('bcc@mail.com')
    ->subject('Hi')
    ->body('Hi there!');
    $email->enqueue();
    }
     public function showUser()
    {
        $hotels = Hotel::all();
        return view('/user/hotelView',compact('hotels'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function hotelUpdate($id)
    {

        $hotels = Hotel::findOrFail($id);
        return view('hotel/hotelUpdate',compact('hotels'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hotelUpdate_post($id,Request $request)
    {
        $hotels=Hotel::findOrFail($id );
        if($hotels)
        {
          $hotels->hotel_name=$request->hotel_name;
          $hotels->hotel_address=$request->hotel_address;
          $hotels->hotel_type=$request->hotel_type;
          $hotels->user_id=$request->user_id;
         
        }
         $hotels->save();
         return redirect('/hotel/hotelView')->with('status', 'Hotel Updated Successfully!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
         $data = Hotel::find($id);
        $data->delete();
        return redirect('/hotel/hotelView')->with('status', 'Hotel Deleted Successfully!');
    }
}

