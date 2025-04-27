<?php

namespace App\Http\Controllers\backend;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\SystemSetting;
use Illuminate\Support\Facades\File;

class PageController extends Controller
{
    public function index() {
        $data['header_title'] = 'Pages';
        $data['pages'] = Page::get();
        return view('backend.pages.list',$data);
    }


    public function edit(string $id) {
        $data['header_title'] = 'Pages Edit';
        $data['page'] = Page::findOrFail($id);
        return view('backend.pages.edit',$data);
    }


    public function update(Request $request, string $id) {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:pages,slug,'.$id.',id',
            'image' => 'image|mimes:jpeg,png'
        ]);

        $page = Page::findOrFail($id);
        $page->name = trim($request->name);
        $page->slug = trim($request->slug);
        $page->title = trim($request->title);
        $page->description = trim($request->description);
        $page->meta_title = trim($request->meta_title);
        $page->meta_description = trim($request->meta_description);
        $page->meta_keywords = trim($request->meta_keywords);
        $page->save();


        if(!empty($request->image)) {
            // old image delete
            File::delete('uploads/pages/'.$page->image);
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time().'.'.$ext;
            $image->move(public_path('/uploads/pages/'),$imageName);
            $page->image = $imageName;
            $page->save();

        }


        return redirect()->route('page.list')->with('success','Page Successfully Updated');
     }



    //  System Setting controller code

     public function SystemSetting() {
        $data['header_title'] = 'System Setting';
        $data['setting'] = SystemSetting::findOrFail(1);
        return view('backend.setting.system-setting',$data);
     }

     public function UpdateSystemSetting(Request $request) {

           $setting = SystemSetting::findOrFail(1);
           $setting->website_name = trim($request->website_name);
           $setting->footer_description = trim($request->footer_description);
           $setting->address = trim($request->address);
           $setting->phone = trim($request->phone);
           $setting->phone_two = trim($request->phone_two);
           $setting->submit_email = trim($request->submit_email);
           $setting->email = trim($request->email);
           $setting->email_two = trim($request->email_two);
           $setting->working_hour = trim($request->working_hour);
           $setting->facebook_link = trim($request->facebook_link);
           $setting->twitter_link = trim($request->twitter_link);
           $setting->instagram_link = trim($request->instagram_link);
           $setting->youtube_link = trim($request->youtube_link);
           $setting->pinterest_link = trim($request->pinterest_link);
           $setting->save();

           if(!empty($request->logo)) {
               // old image delete
               File::delete('uploads/setting/logo/'.$setting->logo);

              $image = $request->logo;
              $ext = $image->getClientOriginalExtension();
              $ImageName = time().'.'.$ext;
              $image->move(public_path('uploads/setting/logo/'),$ImageName);
              $setting->logo = $ImageName;
              $setting->save();
           }

           if(!empty($request->favicon)) {
               // old image delete
            File::delete('uploads/setting/favicon/'.$setting->favicon);
            $image = $request->favicon;
            $ext = $image->getClientOriginalExtension();
            $ImageName = time().'.'.$ext;
            $image->move(public_path('uploads/setting/favicon/'),$ImageName);
            $setting->favicon = $ImageName;
            $setting->save();
         }


            if(!empty($request->footer_payment_icon)) {
                // old image delete
            File::delete('uploads/setting/payment-icon/'.$setting->payment_icon);
            $image = $request->footer_payment_icon;
            $ext = $image->getClientOriginalExtension();
            $ImageName = time().'.'.$ext;
            $image->move(public_path('uploads/setting/payment-icon/'),$ImageName);
            $setting->payment_icon = $ImageName;
            $setting->save();
        }


           return redirect()->back()->with('success','System Setting Successfully Updated');

     }



    //  contact us controller

    public function ContactUs(Request $request) {
    $data['header_title'] = 'Contact Us';
    $contacts = ContactUs::query();
     if(!empty($request->get('query'))) {
      $contacts = $contacts->where('name','like','%'.$request->get('query').'%');
      $contacts = $contacts->orWhere('phone','like','%'.$request->get('query').'%');
      $contacts = $contacts->orWhere('email','like','%'.$request->get('query').'%');
      $contacts = $contacts->orWhere('subject','like','%'.$request->get('query').'%');
      $contacts = $contacts->orWhere('message','like','%'.$request->get('query').'%');
     }
    $contacts= $contacts->orderBy('id','desc');
    $contacts = $contacts->paginate(10);
    $data['contacts'] = $contacts;
      return view('backend.contactUs.list',$data);
    }


    public function ContactDestory(string $id) {
      $contact = ContactUs::findOrFail($id);
      $contact->delete();
      return redirect()->back()->with('success','Contact us Successfully Deleted');
    }
}
