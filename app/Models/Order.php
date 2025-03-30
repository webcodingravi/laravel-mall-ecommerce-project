<?php

namespace App\Models;

use App\Models\OrderItem;
use App\Models\ShippingCharge;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  public function getShipping() {
    return $this->belongsTo(ShippingCharge::class,'shipping_id');
  }

  public function getItem() {
   return $this->hasMany(OrderItem::class,'order_id');
  }

}