<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function index(Request $request) {
    $data['header_title'] = "Blog Categroy List";
    $BlogCategories = BlogCategory::query();
    if(!empty($request->get('query'))) {
        $BlogCategories = $BlogCategories->where('name','like','%'.$request->get('query').'%');
    }

    $BlogCategories = $BlogCategories->orderBy('created_at','desc');
    $BlogCategories = $BlogCategories->paginate(10);
    $data['BlogCategories'] = $BlogCategories;
     return view('backend.blog_category.list',$data);
    }

    public function create() {
        $data['header_title'] = "Create Blog Category";
        return view('backend.blog_category.create',$data);

    }

    public function store(Request $request) {
       $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:blog_categories,slug'
       ]);

       $BlogCategory = new BlogCategory();
       $BlogCategory->name = trim($request->name);
       $BlogCategory->slug = trim($request->slug);
       $BlogCategory->status = trim($request->status);
       $BlogCategory->meta_title = trim($request->meta_title);
       $BlogCategory->meta_description = trim($request->meta_description);
       $BlogCategory->meta_keywords = trim($request->meta_keywords);
       $BlogCategory->save();

       return redirect()->route('BlogCategory.list')->with('success','Blog Category Successfully inserted');
    }

    public function edit(string $id) {
        $data['BlogCategory'] = BlogCategory::findOrFail($id);
        $data['header_title'] = "Edit Blog Category";
        return view('backend.blog_category.edit',$data);


    }

    public function update(Request $request, string $id) {
          $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:blog_categories,slug,'.$id.',',
            ]);

       $BlogCategory = BlogCategory::findOrFail($id);
       $BlogCategory->name = trim($request->name);
       $BlogCategory->slug = trim($request->slug);
       $BlogCategory->status = trim($request->status);
       $BlogCategory->meta_title = trim($request->meta_title);
       $BlogCategory->meta_description = trim($request->meta_description);
       $BlogCategory->meta_keywords = trim($request->meta_keywords);
       $BlogCategory->save();


        return redirect()->route('BlogCategory.list')->with('success','Blog Category Successfully Updated');

    }


    public function destroy(string $id) {
        $BlogCategory = BlogCategory::findOrFail($id);
         $BlogCategory->delete();

        return redirect()->back()->with('success','Blog Category Successfully Deleted');


    }
}