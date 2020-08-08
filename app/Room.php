<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function Reservation()
    {
        return $this->hasOne(Reservation::class,'room_id','room_id');
    }
}
