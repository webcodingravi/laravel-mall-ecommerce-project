<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function TotalProduct() {
        return $this->hasMany(Product::class,'sub_category_id')->where('status',1)->count();
    }
}