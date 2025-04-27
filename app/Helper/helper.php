<?php

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ProductImage;
use App\Models\ProductReview;
use App\Models\ProductWishlist;
use App\Models\SystemSetting;
use Illuminate\Support\Facades\Auth;

function getCategoryHeader() {
    return Category::where('status',1)->orderBy('id','desc')->get();
}


function getProductImageSingle($product_id) {
 return ProductImage::where('product_id',$product_id)->orderBy('order_by','asc')->first();
}



function getCartProduct($id) {
    return Product::findOrFail($id);
}

function CheckWishlist($product_id) {
    return ProductWishlist::where('product_id',$product_id)->where('user_id',Auth::user()->id)->count();
}


function getReview($product_id, $order_id) {
   return ProductReview::where('product_id',$product_id)
   ->where('order_id',$order_id)
   ->where('user_id',Auth::user()->id)
   ->first();
}

function getReviewRating($product_id) {
 $avg = ProductReview::select('product_reviews.rating')
 ->join('users','users.id','product_reviews.user_id')
 ->where('product_reviews.product_id',$product_id)
 ->avg('product_reviews.rating');

 if($avg >= 1 && $avg <= 1) {
    return 20;
 }elseif($avg >= 2 && $avg <= 2) {
    return 40;
 }elseif($avg >= 3 && $avg <= 3) {
    return 60;
 }elseif($avg >= 4 && $avg <= 4) {
    return 80;
 }elseif($avg >= 5 && $avg <= 5){
    return 100;
 }else{
    return 0;
 }

}

function getSystemSetting() {
   return SystemSetting::findOrFail(1);
}
?>