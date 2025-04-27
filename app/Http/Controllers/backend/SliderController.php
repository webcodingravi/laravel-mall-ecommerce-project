<?php

namespace App\Http\Controllers\backend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index(Request $request) {
        $data['header_title'] = 'Slider List';
        $sliders = Slider::query();
        if(!empty($request->get('query'))) {
         $sliders = $sliders->where('title','like','%'.$request->get('query').'%');
        }
        $sliders = $sliders->orderBy('created_at','desc');
        $sliders = $sliders->paginate(10);
        $data['sliders'] = $sliders;
      return view('backend.slider.list',$data);
    }


    public function create() {
        $data['header_title'] = 'Slider Create';
      return view('backend.slider.create',$data);
    }


    public function store(Request $request) {
        $request->validate([
           'title' => 'required',
           'image_name' => 'image'
        ]);

        $image = $request->image_name;
        $ext = $image->getClientOriginalExtension();
        $ImageName = time().'.'.$ext;
        $image->move(public_path('uploads/slider/'),$ImageName);

        $slider = new Slider();
        $slider->title = trim($request->title);
        $slider->image_name = $ImageName;
        $slider->button_name = trim($request->button_name);
        $slider->button_link = trim($request->button_link);
        $slider->status = trim(($request->status));
        $slider->save();

        return redirect()->route('slider.list')->with('success','New Slider Successfully Added');

    }

    public function edit(string $id) {
        $data['header_title'] = 'Slider Edit';
        $data['slider'] = Slider::findOrFail($id);
       return view('backend.slider.edit',$data);
    }

    public function update(Request $request, string $id) {

        $request->validate([
            'title' => 'required',
            'image_name' => 'image'
         ]);

         $slider = Slider::findOrFail($id);
         $slider->title = trim($request->title);
         $slider->button_name = trim($request->button_name);
         $slider->button_link = trim($request->button_link);
         $slider->status = trim(($request->status));
         $slider->save();

         if(!empty($request->image_name)) {
            // old image Deleted
            File::delete('uploads/slider/'.$slider->image_name);
            $image = $request->image_name;
            $ext = $image->getClientOriginalExtension();
            $ImageName = time().'.'.$ext;
            $image->move(public_path('uploads/slider/'),$ImageName);
            $slider->image_name = $ImageName;
            $slider->save();
         }

         return redirect()->route('slider.list')->with('success','Slider Successfully Updated');




    }

    public function destroy(string $id) {
        $slider = Slider::findOrFail($id);
        $slider->delete();

        return redirect()->back()->with('success','Slider Successfully Deleted');

    }
}
