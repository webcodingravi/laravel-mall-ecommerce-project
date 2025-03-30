<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    public function getProduct() {
        return $this->belongsTo(Product::class,'product_id');
    }
}