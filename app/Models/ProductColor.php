<?php

namespace App\Models;

use App\Models\Color;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    public function getColor() {
        return $this->belongsTo(Color::class, 'color_id');
    }
}