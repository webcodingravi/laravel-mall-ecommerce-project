<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    public function index(Request $request) {
        $data['header_title'] = 'Sub Category List';
        $SubCategories = SubCategory::select('sub_categories.*','users.name as created_by','categories.name as CategoryName');
        $SubCategories  = $SubCategories->join('users','users.id','sub_categories.user_id');
        $SubCategories  = $SubCategories->join('categories','categories.id','sub_categories.category_id');
        if(!empty($request->get('query'))) {
            $SubCategories = $SubCategories->where('sub_categories.name','like','%'.$request->get('query').'%');
        }
        $SubCategories= $SubCategories->orderBy('sub_categories.id','desc');
        $SubCategories = $SubCategories->paginate(10);
        $data['SubCategories'] = $SubCategories;
          return view('backend.sub-category.list',$data);

    }

    public function create() {
        $data['header_title'] = 'Sub Category Create';
        $data['getCategory'] = Category::where('status',1)->get();
        return view('backend.sub-category.create',$data);

    }


    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,',
            'category_id' => 'required'
        ]);

        $SubCategory = new SubCategory();
        $SubCategory->name = trim($request->name);
        $SubCategory->slug = trim($request->slug);
        $SubCategory->category_id = trim($request->category_id);
        $SubCategory->status = trim($request->status);
        $SubCategory->meta_title = trim($request->meta_title);
        $SubCategory->meta_description = trim($request->meta_description);
        $SubCategory->meta_keywords = trim($request->meta_keywords);
        $SubCategory->user_id = Auth::user()->id;
        $SubCategory->save();
        return redirect()->route('sub-category.list')->with('success','New Sub Category Successfully Created.');

    }

    public function edit(string $id) {
        $data['header_title'] = 'Edit Sub Category';
        $data['getCategory'] = Category::where('status',1)->get();
        $data['getSubCategory'] = SubCategory::findOrFail($id);
         return view('backend.sub-category.edit',$data);
    }

    public function update(Request $request, string $id) {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,'.$id.',id',
            'category_id' => 'required'

        ]);

        $SubCategory = SubCategory::findOrFail($id);
        $SubCategory->name = trim($request->name);
        $SubCategory->slug = trim($request->slug);
        $SubCategory->category_id = trim($request->category_id);
        $SubCategory->status = trim($request->status);
        $SubCategory->meta_title = trim($request->meta_title);
        $SubCategory->meta_description = trim($request->meta_description);
        $SubCategory->meta_keywords = trim($request->meta_keywords);
        $SubCategory->user_id = Auth::user()->id;
        $SubCategory->save();

        return redirect()->route('sub-category.list')->with('success','Sub Category Successfully Updated.');


    }


    public function destroy(string $id) {
        $SubCategory = SubCategory::findOrFail($id);
        $SubCategory->delete();

        return redirect()->back()->with('success','Sub Category Successfully Deleted');
    }
}