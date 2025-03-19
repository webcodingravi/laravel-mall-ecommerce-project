<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ShowProductController extends Controller
{

    public function getProductSearch() {
            $data['meta_title'] = 'Search';
            $data['meta_description'] = '';
            $data['meta_keywords'] = '';

            $getProduct = Product::getProduct();
            $page = 0;
            if(!empty($getProduct->nextPageUrl())) {
              $parse_url = parse_url($getProduct->nextPageUrl());
              if(!empty($parse_url['query'])) {
                 parse_str($parse_url['query'], $get_array);
                 $page = !empty($get_array['page']) ? $get_array['page'] : 0;
              }
            }

            $data['page'] = $page;
            $data['getProduct'] = $getProduct;
            $data['getColor'] = Color::where('status',1)->orderBy('name','asc')->get();
            $data['getBrand'] = Brand::where('status',1)->orderBy('name','asc')->get();

            return view('product.ShowProduct',$data);

    }


    public function ShowProduct(string $slug, $subCategoryslug = '') {
        $getCategory = Category::where('slug',$slug)->where('status',1)->first();
        $getSubCategory = SubCategory::where('slug',$subCategoryslug)->where('status',1)->first();
        $data['getColor'] = Color::where('status',1)->orderBy('name','asc')->get();
        $data['getBrand'] = Brand::where('status',1)->orderBy('name','asc')->get();

        //    product detail page
        $getProductSingle = Product::where('slug',$slug)->first();
        if(!empty($getProductSingle)) {
            $data['meta_title'] = $getProductSingle->title;
            $data['meta_description'] = $getProductSingle->short_description;
            $data['meta_keywords'] = '';
            $data['getProductSingle'] = $getProductSingle;
            $data['getRelatedProduct'] = Product::select('products.*', 'categories.name as category_name',
            'categories.slug as category_slug', 'sub_categories.name as SubCategory_name', 'sub_categories.slug as SubCategory_slug')
            ->join('categories','categories.id','products.category_id')
            ->join('sub_categories','sub_categories.id','products.sub_category_id')
            ->where('products.id', '!=',$getProductSingle->id)
            ->where('products.sub_category_id', '!=',$getProductSingle->sub_category_id)
            ->where('products.status',1)
            ->orderBy('products.id','desc')
            ->take(10)
            ->get();
            return view('product.ShowProductDetail',$data);
        }



        if(!empty($getCategory) && !empty($getSubCategory)) {
            $data['meta_title'] = $getSubCategory->meta_title;
            $data['meta_description'] = $getSubCategory->meta_description;
            $data['meta_keywords'] = $getSubCategory->meta_keywords;
            $data['getCategory'] = $getCategory;
            $data['getSubCategory'] = $getSubCategory;
            $getProduct = Product::getProduct($getCategory->id, $getSubCategory->id);

            $page = 0;
            if(!empty($getProduct->nextPageUrl())) {
              $parse_url = parse_url($getProduct->nextPageUrl());
              if(!empty($parse_url['query'])) {
                 parse_str($parse_url['query'], $get_array);
                 $page = !empty($get_array['page']) ? $get_array['page'] : 0;
              }
            }

            $data['page'] = $page;
            $data['getProduct'] = $getProduct;
            $data['getSubCategoryFilter'] = SubCategory::where('status',1)
            ->where('category_id',$getCategory->id)
            ->orderBy('name','asc')
            ->get();

            return view('product.ShowProduct',$data);
        }
        else if(!empty($getCategory)) {
            $data['getSubCategoryFilter'] = SubCategory::where('status',1)
            ->where('category_id',$getCategory->id)
            ->orderBy('name','asc')
            ->get();

            $data['getCategory'] = $getCategory;
            $data['meta_title'] = $getCategory->meta_title;
            $data['meta_description'] = $getCategory->meta_description;
            $data['meta_keywords'] = $getCategory->meta_keywords;

            $getProduct = Product::getProduct($getCategory->id);

            $page = 0;
            if(!empty($getProduct->nextPageUrl())) {
              $parse_url = parse_url($getProduct->nextPageUrl());
              if(!empty($parse_url['query'])) {
                 parse_str($parse_url['query'], $get_array);
                 $page = !empty($get_array['page']) ? $get_array['page'] : 0;
              }
            }

            $data['page'] = $page;

            $data['getProduct'] = $getProduct;

            return view('product.ShowProduct',$data);
        }else{
            abort(404);
        }


    }


    public function FilterProduct() {
         $getProduct = Product::getProduct();

         $page = 0;
         if(!empty($getProduct->nextPageUrl())) {
           $parse_url = parse_url($getProduct->nextPageUrl());
           if(!empty($parse_url['query'])) {
              parse_str($parse_url['query'], $get_array);
              $page = !empty($get_array['page']) ? $get_array['page'] : 0;
           }
         }

         return response()->json([
              'status' => true,
              'page' => $page,
              'success' => view('product.list',[
                'getProduct' => $getProduct
              ])->render(),
         ],200);

    }


    public function ProductDetail($slug) {

    }

}
