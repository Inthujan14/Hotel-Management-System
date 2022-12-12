<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotels';

	 protected $guarded = ['id'];

     protected $fillable = [
        'hotel_name','hotel_address','hotel_type','user_id',
    ];
}
