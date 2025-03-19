<?php

namespace App\Models;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function getHeaderSubCategory() {
        return $this->hasMany(SubCategory::class,'category_id')->where('sub_categories.status',1);
    }
}