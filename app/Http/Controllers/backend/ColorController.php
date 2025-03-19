<?php

namespace App\Http\Controllers\backend;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ColorController extends Controller
{
    public function index(Request $request) {
        $data['header_title'] = 'Color List';
        $colors = Color::select('colors.*','users.name as created_by');
        $colors = $colors->join('users','users.id','colors.user_id');
        if(!empty($request->get('query'))) {
            $colors = $colors->where('colors.name','like','%'.$request->get('query').'%');
            $colors = $colors->orWhere('users.code','like','%'.$request->get('query').'%');
            $colors = $colors->orWhere('users.name','like','%'.$request->get('query').'%');
        }
        $colors = $colors->orderBy('colors.id','desc');
        $colors = $colors->paginate(10);
        $data['colors'] = $colors;
          return view('backend.color.list',$data);
       }


       public function create() {
         $data['header_title'] = 'Create Color';
           return view('backend.color.create',$data);
       }

       public function store(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        $color = new Color();
        $color->name = trim($request->name);
        $color->code = trim($request->code);
        $color->status = trim($request->status);
        $color->user_id = Auth::user()->id;
        $color->save();
        return redirect()->route('color.list')->with('success','New Color Successfully Created.');


       }

       public function edit(string $id) {
            $data['header_title'] = 'Edit Brand';
            $data['color'] = Color::findOrFail($id);
           return view('backend.color.edit',$data);
       }

       public function update(Request $request, string $id) {

        $request->validate([
            'name' => 'required',


        ]);

        $color = Color::findOrFail($id);
        $color->name = trim($request->name);
        $color->code = trim($request->code);
        $color->status = trim($request->status);
        $color->user_id = Auth::user()->id;
        $color->save();

        return redirect()->route('color.list')->with('success','Color Successfully Updated.');

       }


       public function destroy(string $id) {
             $color = Color::findOrFail($id);
             $color->delete();

             return redirect()->back()->with('success','Color Deleted Successfully');
       }
}