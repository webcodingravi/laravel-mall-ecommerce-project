<?php

namespace App\Http\Controllers\backend;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductSize;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(Request $request) {
        $data['header_title'] = 'Product List';
        $products = Product::select('products.*','users.name as created_by');
        $products = $products->join('users','users.id','products.user_id');
        if(!empty($request->get('query'))) {
            $products = $products->where('products.title','like','%'.$request->get('query').'%');
        }
        $products= $products->orderBy('products.id','desc');
        $products = $products->paginate(10);
        $data['products'] = $products;
          return view('backend.product.list',$data);

    }

    public function create() {
        $data['header_title'] = 'Product Create';
        return view('backend.product.create',$data);

    }


    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:products,slug,',
        ]);

        $product = new Product();
        $product->title = trim($request->title);
        $product->slug = trim($request->slug);
        $product->user_id = Auth::user()->id;
        $product->save();
        return redirect()->route('product.list')->with('success','New Product Successfully Created.');

    }

    public function edit(string $id) {
        $data['header_title'] = 'Edit Product';
        $product = Product::findOrFail($id);
        $data['getCategory'] = Category::where('status',1)->orderBy('id','asc')->get();
        $data['getSubCategory'] = SubCategory::where(['category_id'=> $product->category_id, 'status' => 1])->orderBy('id','asc')->get();
        $data['getBrand'] = Brand::where('status',1)->orderBy('id','asc')->get();
        $data['getColor'] = Color::where('status',1)->orderBy('id','asc')->get();
        $data['product'] = $product;
         return view('backend.product.edit',$data);
    }

    public function update(Request $request, string $id) {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:products,slug,'.$id.',id',
            'brand_id' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required'

        ]);
        $product = Product::findOrFail($id);

        $product->title = trim($request->title);
        $product->slug = trim($request->slug);
        $product->sku = trim($request->sku);
        $product->category_id = trim($request->category_id);
        $product->sub_category_id = trim($request->sub_category_id);
        $product->brand_id = trim($request->brand_id);
        $product->user_id = Auth::user()->id;
        $product->price = trim($request->price);
        $product->old_price = trim($request->old_price);
        $product->short_description = trim($request->short_description);
        $product->description = trim($request->description);
        $product->additional_information = trim($request->additional_information);
        $product->shipping_returns = trim($request->shipping_returns);
        $product->status = trim($request->status);
        $product->save();

        ProductColor::where('product_id',$product->id)->delete();
         if(!empty($request->color_id)) {
            foreach($request->color_id as $color_id) {
             $color = new ProductColor();
             $color->color_id = $color_id;
             $color->product_id = $product->id;
             $color->save();
            }
         }

         ProductSize::where('product_id',$product->id)->delete();
         if(!empty($request->size)) {
             foreach($request->size as $size) {
               if(!empty($size['size'])) {
                  $saveSize = new ProductSize();
                  $saveSize->size = $size['size'];
                  $saveSize->price = !empty($size['price']) ? $size['price'] : 0;
                  $saveSize->product_id = $product->id;
                  $saveSize->save();
               }
             }
         }


         if(!empty($request->image)) {
            foreach($request->image as $image) {
                if($image->isValid()) {
                   $ext = $image->getClientOriginalExtension();
                   $imageName = time(). Str::random(10).'.'.$ext;
                   $image->move(public_path('uploads/product/'),$imageName);
                   $imageUpload = new ProductImage();
                   $imageUpload->image_name = $imageName;
                   $imageUpload->image_extension = $ext;
                   $imageUpload->product_id = $product->id;
                   $imageUpload->save();
                }
            }
        }



        return redirect()->back()->with('success','Product Successfully Updated.');


    }





    public function destroy(string $id) {
        $ProductImage = ProductImage::where('product_id',$id)->get();
        foreach($ProductImage as $Image) {
            // image delete file
            File::delete(public_path('/uploads/product/'.$Image->image_name));
        }


        $product = Product::findOrFail($id);
        $product->delete();



        return redirect()->back()->with('success','Product Successfully Deleted');
    }


    public function getSubCategory(Request $request) {
        $category_id = $request->id;
        $getSubCategory = SubCategory::where(['category_id'=> $category_id, 'status' => 1])->orderBy('id','asc')->get();

        $html = '';
        $html .= '<option value="">Please Select ..</option>';
        foreach($getSubCategory as $SubCategory) {
            $html .= '<option value="'.$SubCategory->id.'">'.$SubCategory->name.'</option>';
        }

        return response()->json([
            'html' => $html
        ]);

    }



    public function ImageDelete(string $id) {
        $image = ProductImage::findOrFail($id);
        $image->delete();

        // image delete file
        File::delete(public_path('/uploads/product/'.$image->image_name));

        return redirect()->back()->with('success','Product Image Successfully Deleted');


    }



    public function ProductImageSortable(Request $request) {
        if(!empty($request->photo_id)) {
            $i = 1;
           foreach($request->photo_id as $photo_id) {
             $image = ProductImage::findOrFail($photo_id);
              $image->order_by = $i;
              $image->save();

              $i++;
           }
        }

        return response()->json([
            'status' => true
        ]);
    }

}