<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   public function reservation()
   {
      return $this->hasMany(Reservation::class,'customer_id','reservation_id');
   }
   public function invoice()
   {
      return $this->hasMany(Invoice::class,'customer_id','invoice_id');
   }
   public function payments()
   {
      return $this->hasMany(Payment::class,'customer_id','payment_id');
   }
}
