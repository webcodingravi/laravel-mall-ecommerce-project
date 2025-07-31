<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
      public function getCountBlog() {
        return $this->hasMany(Blog::class, 'blog_category_id')
        ->where('status',1)
        ->count();
    }
}
