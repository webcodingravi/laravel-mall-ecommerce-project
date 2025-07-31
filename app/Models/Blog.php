<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  public function getCategory() {
    return $this->belongsTo(BlogCategory::class,'blog_category_id');
  }

 public function getComment() {
    return $this->hasMany(BlogComment::class, 'blog_id')
    ->select('blog_comments.*')
    ->join('users','users.id', '=','blog_comments.user_id');
 }

  public function getCommentCount() {
    return $this->hasMany(BlogComment::class, 'blog_id')
    ->select('blog_comments.id*')
    ->join('users','users.id', '=','blog_comments.user_id')->count();
 }

}
