<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

	 protected $guarded = ['id'];

     protected $fillable = [
       'booked_from','booked_to','pay_amount','card_number','card_type','expiry_date','security_code','first_name','last_name','hotel_id','room_id','user_id',
    ];
}
