<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';

	 protected $guarded = ['id'];

     protected $fillable = [
        'room_number','room_type','room_rent','available','room_from','room_to','hotel_id',
    ];
}
