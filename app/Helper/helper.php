<?php

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ProductImage;
use App\Models\ProductWishlist;
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
?>