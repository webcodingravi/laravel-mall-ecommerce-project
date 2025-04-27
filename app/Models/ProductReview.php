<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    public function rating() {
      $rating = $this->rating;
      if($rating == 1)
      {
        return 20;
      }
      elseif($rating == 2){
        return 20;
      }
      elseif($rating == 3){
        return 60;
      }
      elseif($rating == 4){
        return 80;
      }
      elseif($rating == 5){
        return 100;
      }else{
        return 0;
      }
    }
}