<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
   public function getUser() {
    return $this->belongsTo(User::class,'user_id');
   }
}
