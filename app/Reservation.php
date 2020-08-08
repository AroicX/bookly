<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function Customer()
    {
        return $this->belongsTo(Customer::class,'customer_id','customer_id');
    }

    public function Room()
    {
        return $this->belongsTo(Room::class,'room_id','room_id');
    }


}
