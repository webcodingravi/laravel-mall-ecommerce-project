<?php

namespace App\Http\Controllers\backend;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index() {
        $data['header_title'] = 'Blog List';
        $blogs = Blog::select('blogs.*','users.name as createdBy');
        $blogs = $blogs->join('users','users.id','blogs.user_id')
        ->orderBy('blogs.created_at','desc')
        ->paginate(10);
        $data['blogs'] = $blogs;
        return view('backend.blog.list',$data);

    }

    // live search blog
    public function search(Request $request){
        if($request->ajax()) {
            $query = $request->get('query');
            $blogs = Blog::where('title','like','%'.$query.'%')->get();
            return view('backend.blog.table',compact('blogs'))->render();
        }
    }


    public function create() {
        $data['header_title'] = 'New Blog Create';
        $data['getBlogCategory'] = BlogCategory::orderBy('name','asc')->get();
        return view('backend.blog.create',$data);


    }

    public function store(Request $request) {
        $request->validate([
             'title' => 'required',
              'slug' => 'required|unique:blogs,slug',
      ]);



     $blog = new Blog();
     $blog->title = trim($request->title);
     $blog->slug = trim($request->slug);
     $blog->blog_category_id = trim($request->blog_category_id);
     $blog->user_id = (!empty(Auth::user()->id));
     $blog->description = trim($request->description);
     $blog->status = trim($request->status);
     $blog->meta_title = trim($request->meta_title);
     $blog->meta_description = trim($request->meta_description);
     $blog->meta_keywords = trim($request->meta_keywords);
     $blog->save();

     if(!empty($request->image)) {
     $image = $request->image;
     $ext = $image->getClientOriginalExtension();
     $imageName = strtotime('now').'.'.$ext;
     $image->move(public_path('uploads/blogs/'),$imageName);
     $blog->image = $imageName;
     $blog->save();
     }


    return redirect()->route('blog.list')->with('success','Blog Successfully Created !');

    }

    public function edit(string $id) {
    $data['header_title'] = 'Blog Edit';
    $data['blog'] = Blog::findOrFail($id);
     $data['getBlogCategory'] = BlogCategory::orderBy('name','asc')->get();
    return view('backend.blog.edit',$data);
    }

    public function update(Request $request, string $id) {
            $blog = Blog::findOrFail($id);
            $request->validate([
             'title' => 'required',
              'slug' => 'required|unique:blogs,slug,'.$id.',id',
      ]);

     $blog->title = trim($request->title);
     $blog->slug = trim($request->slug);
     $blog->blog_category_id = trim($request->blog_category_id);
     $blog->user_id = (!empty(Auth::user()->id));
     $blog->description = trim($request->description);
     $blog->status = trim($request->status);
     $blog->meta_title = trim($request->meta_title);
     $blog->meta_description = trim($request->meta_description);
     $blog->meta_keywords = trim($request->meta_keywords);
     $blog->save();

    if(!empty($request->image)) {
    //  old image Deleted
    File::delete(public_path('uploads/blogs/'.$blog->image));
     $image = $request->image;
     $ext = $image->getClientOriginalExtension();
     $imageName = strtotime('now').'.'.$ext;
     $image->move(public_path('uploads/blogs/'),$imageName);
     $blog->image = $imageName;
     $blog->save();
     }

      return redirect()->route('blog.list')->with('success','Blog Successfully Updated !');

    }

    public function destory(string $id) {
        $blog = Blog::findOrFail($id);
        $blog->delete();

      //  old image Deleted
        File::delete(public_path('uploads/blogs/'.$blog->image));
        return redirect()->back()->with('success','Blog Deleted successfully');

    }
}
