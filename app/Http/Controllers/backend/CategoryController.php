<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
  public function index(Request $request) {
    $data['header_title'] = 'Category List';
    $categories = Category::select('categories.*','users.name as created_by');
    $categories = $categories->join('users','users.id','categories.user_id');
    if(!empty($request->get('query'))) {
        $categories = $categories->where('categories.name','like','%'.$request->get('query').'%');
        $categories = $categories->orWhere('users.name','like','%'.$request->get('query').'%');
    }
    $categories = $categories->orderBy('categories.id','desc');
    $categories = $categories->paginate(10);
    $data['categories'] = $categories;
      return view('backend.category.list',$data);
  }


  public function create() {
    $data['header_title'] = 'Create Category';
     return view('backend.category.create',$data);
  }

  public function store(Request $request) {
    $request->validate([
        'name' => 'required',
        'slug' => 'required|unique:categories,slug,',
        'image_name' => 'image'
    ]);

    $image = $request->image_name;
    $ext = $image->getClientOriginalExtension();
    $ImageName = time().'.'.$ext;
    $image->move(public_path('uploads/category/'),$ImageName);

    $category = new Category();
    $category->name = trim($request->name);
    $category->slug = trim($request->slug);
    $category->image_name = $ImageName;
    $category->button_name = trim($request->button_name);
    $category->is_home = !empty($request->is_home) ? 1 : 0;
    $category->status = trim($request->status);
    $category->meta_title = trim($request->meta_title);
    $category->meta_description = trim($request->meta_description);
    $category->meta_keywords = trim($request->meta_keywords);
    $category->user_id = Auth::user()->id;
    $category->save();
    return redirect()->route('category.list')->with('success','New Category Successfully Created.');


  }

  public function edit(string $id) {
    $data['header_title'] = 'Edit Category';
    $data['getCategory'] = Category::findOrFail($id);
     return view('backend.category.edit',$data);

  }

  public function update(Request $request, string $id) {

    $request->validate([
        'name' => 'required',
        'slug' => 'required|unique:categories,slug,'.$id.',id',
        'image_name' => 'image'

    ]);

    $category = Category::findOrFail($id);
    $category->name = trim($request->name);
    $category->slug = trim($request->slug);
    $category->button_name = trim($request->button_name);
    $category->is_home = !empty($request->is_home) ? 1 : 0;
    $category->status = trim($request->status);
    $category->meta_title = trim($request->meta_title);
    $category->meta_description = trim($request->meta_description);
    $category->meta_keywords = trim($request->meta_keywords);
    $category->user_id = Auth::user()->id;
    $category->save();

    if(!empty($request->image_name)) {
        // old image deleted
        File::delete('uploads/category/'.$category->image_name);
        $image = $request->image_name;
        $ext = $image->getClientOriginalExtension();
        $ImageName = time().'.'.$ext;
        $image->move(public_path('uploads/category/'),$ImageName);
        $category->image_name = $ImageName;
        $category->save();
    }

    return redirect()->route('category.list')->with('success','Category Successfully Updated.');


  }


  public function destroy(string $id) {
    $category = Category::findOrFail($id);
    $category->delete();

    return redirect()->back()->with('success','Category Successfully Deleted');
  }



}