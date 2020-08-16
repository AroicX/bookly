<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'customer_id',
        'room_id',
        'payment_by',
        'arrival',
        'departure',
        'stay',
        'amount',
    ];

    public function Customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    public function Room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'room_id');
    }
}
