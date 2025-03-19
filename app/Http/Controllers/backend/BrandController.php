<?php

namespace App\Http\Controllers\backend;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
   public function index(Request $request) {
    $data['header_title'] = 'Brand List';
    $brands = Brand::select('brands.*','users.name as created_by');
    $brands = $brands->join('users','users.id','brands.user_id');
    if(!empty($request->get('query'))) {
        $brands = $brands->where('brands.name','like','%'.$request->get('query').'%');
        $brands = $brands->orWhere('users.name','like','%'.$request->get('query').'%');
    }
    $brands = $brands->orderBy('brands.id','desc');
    $brands = $brands->paginate(10);
    $data['brands'] = $brands;
    $data['brands'] = $brands;
      return view('backend.brand.list',$data);
   }


   public function create() {
     $data['header_title'] = 'Create Brand';
       return view('backend.brand.create',$data);
   }

   public function store(Request $request) {
    $request->validate([
        'name' => 'required',
        'slug' => 'required|unique:categories,slug,'
    ]);

    $brand = new Brand();
    $brand->name = trim($request->name);
    $brand->slug = trim($request->slug);
    $brand->status = trim($request->status);
    $brand->meta_title = trim($request->meta_title);
    $brand->meta_description = trim($request->meta_description);
    $brand->meta_keywords = trim($request->meta_keywords);
    $brand->user_id = Auth::user()->id;
    $brand->save();
    return redirect()->route('brand.list')->with('success','New Brand Successfully Created.');


   }

   public function edit(string $id) {
        $data['header_title'] = 'Edit Brand';
        $data['brand'] = Brand::findOrFail($id);
       return view('backend.brand.edit',$data);
   }

   public function update(Request $request, string $id) {

    $request->validate([
        'name' => 'required',
        'slug' => 'required|unique:categories,slug,'.$id.',id',

    ]);

    $brand = Brand::findOrFail($id);
    $brand->name = trim($request->name);
    $brand->slug = trim($request->slug);
    $brand->status = trim($request->status);
    $brand->meta_title = trim($request->meta_title);
    $brand->meta_description = trim($request->meta_description);
    $brand->meta_keywords = trim($request->meta_keywords);
    $brand->user_id = Auth::user()->id;
    $brand->save();

    return redirect()->route('category.list')->with('success','Brand Successfully Updated.');

   }


   public function destroy(string $id) {
         $brand = Brand::findOrFail($id);
         $brand->delete();

         return redirect()->back()->with('success','Brand Deleted Successfully');
   }
}