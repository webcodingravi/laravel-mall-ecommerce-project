<?php

namespace App\Models;

use App\Models\ProductSize;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Product extends Model
{
    static public function getProduct($category_id = '', $subCategory_id = '') {
         $product = Product::select('products.*','categories.name as category_name',
         'categories.slug as category_slug', 'sub_categories.name as SubCategory_name', 'sub_categories.slug as SubCategory_slug')
         ->join('categories','categories.id','products.category_id')
         ->join('sub_categories','sub_categories.id','products.sub_category_id');
          if(!empty($category_id)) {
             $product = $product->where('products.category_id',$category_id);
          }

          if(!empty($subCategory_id)) {
            $product = $product->where('products.sub_category_id',$subCategory_id);
          }

          if(!empty(Request::get('sub_category_id'))){
            $sub_category_id = rtrim(Request::get('sub_category_id'),',');
            $sub_category_id_array = explode(",",$sub_category_id);
            $product = $product->whereIn('products.sub_category_id',$sub_category_id_array);
          }

          else{
            if(!empty(Request::get('old_category_id'))){
                $product = $product->where('products.category_id',Request::get('old_category_id'));
              }

              if(!empty(Request::get('old_sub_category_id'))){
                $product = $product->where('products.sub_category_id',Request::get('old_sub_category_id'));
              }
          }

          if(!empty(Request::get('color_id'))){
            $color_id = rtrim(Request::get('color_id'),',');
            $color_id_array = explode(",",$color_id);
            $product = $product->join('product_colors','product_colors.product_id','products.id');
            $product = $product->whereIn('product_colors.color_id',$color_id_array);
          }

          if(!empty(Request::get('brand_id'))){
            $brand_id = rtrim(Request::get('brand_id'),',');
            $brand_id_array = explode(",",$brand_id);
            $product = $product->whereIn('products.brand_id',$brand_id_array );
          }

          if(!empty(Request::get('start_price')) && !empty(Request::get('end_price'))) {
               $start_price = str_replace('$','',Request::get('start_price'));
               $end_price = str_replace('$','',Request::get('end_price'));

               $product = $product->where('products.price','>=',$start_price);
               $product = $product->where('products.price','<=',$end_price);
          }

          if(!empty(Request::get('q'))) {
              $product = $product->where('products.title','like','%'.Request::get('q').'%');
          }


        $product = $product->orderBy('products.id','desc');
        $product = $product->where('products.status',1);
        $product = $product->paginate(3);

        return $product;
    }

    public function getColor() {
        return $this->hasMany(ProductColor::class, 'product_id');
    }

    public function getSize() {
        return $this->hasMany(ProductSize::class,'product_id');
    }

    public function getImage() {
        return $this->hasMany(ProductImage::class,'product_id')->orderBy('order_by','asc');
    }


    public function getCategory() {
       return $this->belongsTo(Category::class,'category_id');
    }

    public function getSubCategory() {
        return $this->belongsTo(SubCategory::class,'sub_category_id');
     }
}
