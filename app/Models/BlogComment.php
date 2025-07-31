<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    public function getUser() {
        return $this->belongsTo(User::class,'user_id');
    }
}
