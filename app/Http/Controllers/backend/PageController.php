<?php

namespace App\Http\Controllers\backend;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\HomeSetting;
use App\Models\Notification;
use App\Models\PaymentSetting;
use App\Models\Smtp;
use App\Models\SystemSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PageController extends Controller
{

    // notification
    public function notification() {
        $data['header_title'] = 'Notifications';
        $data['getRecord'] = Notification::where('user_id',1)->orderBy('id','desc')->paginate(40);
        return view('backend.notification.list',$data);
    }


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


    public function HomeSetting() {
        $data['header_title'] = 'Home Setting';
        $data['getRecord'] = HomeSetting::findOrFail(1);
        return view('backend.setting.home-setting',$data);
    }


         public function UpdateHomeSetting(Request $request) {

           $HomeSetting = HomeSetting::findOrFail(1);
           $HomeSetting->trendy_product_title = trim($request->trendy_product_title);
           $HomeSetting->shop_category_title = trim($request->shop_category_title);
           $HomeSetting->recent_arrival_title = trim($request->recent_arrival_title);
           $HomeSetting->blog_title = trim($request->blog_title);
           $HomeSetting->payment_delivery_title = trim($request->payment_delivery_title);
           $HomeSetting->payment_delivery_description = trim($request->payment_delivery_description);
           $HomeSetting->refund_title = trim($request->refund_title);
           $HomeSetting->refund_description = trim($request->refund_description);
           $HomeSetting->support_title = trim($request->support_title);
           $HomeSetting->support_description = trim($request->support_description);
           $HomeSetting->signup_title = trim($request->signup_title);
           $HomeSetting->signup_description = trim($request->signup_description);
           $HomeSetting->save();

           if(!empty($request->payment_delivery_image)) {
               // old image delete
               File::delete('uploads/home-setting/'.$HomeSetting->payment_delivery_image);

              $image = $request->payment_delivery_image;
              $ext = $image->getClientOriginalExtension();
              $ImageName = time().'.'.$ext;
              $image->move(public_path('uploads/home-setting/'),$ImageName);
              $HomeSetting->payment_delivery_image = $ImageName;
              $HomeSetting->save();
           }

           if(!empty($request->refund_image)) {
               // old image delete
            File::delete('uploads/setting/favicon/'.$HomeSetting->refund_image);
            $image = $request->refund_image;
            $ext = $image->getClientOriginalExtension();
            $ImageName = time().'.'.$ext;
            $image->move(public_path('uploads/home-setting/'),$ImageName);
            $HomeSetting->refund_image = $ImageName;
            $HomeSetting->save();
         }


            if(!empty($request->support_image)) {
                // old image delete
            File::delete('uploads/home-setting/'.$HomeSetting->payment_icon);
            $image = $request->support_image;
            $ext = $image->getClientOriginalExtension();
            $ImageName = time().'.'.$ext;
            $image->move(public_path('uploads/home-setting/'),$ImageName);
            $HomeSetting->support_image = $ImageName;
            $HomeSetting->save();
        }

            if(!empty($request->signup_image)) {
                // old image delete
            File::delete('uploads/home-setting/'.$HomeSetting->signup_image);
            $image = $request->signup_image;
            $ext = $image->getClientOriginalExtension();
            $ImageName = time().'.'.$ext;
            $image->move(public_path('uploads/home-setting/'),$ImageName);
            $HomeSetting->signup_image = $ImageName;
            $HomeSetting->save();
        }




           return redirect()->back()->with('success','Home Setting Successfully Updated');

     }


     public function smtp_setting() {
        $data['getRecord'] = Smtp::findOrFail(1);
        $data['header_title'] = 'SMTP setting';
        return view('backend.setting.smtp-setting',$data);
     }


     public function update_smtp_setting(Request $request) {
        $smtp = Smtp::findOrFail(1);
        $smtp->name = trim($request->name);
        $smtp->mail_mailer = trim($request->mail_mailer);
        $smtp->mail_host = trim($request->mail_host);
        $smtp->mail_port = trim($request->mail_port);
        $smtp->mail_username = trim($request->mail_username);
        $smtp->mail_password = trim($request->mail_password);
        $smtp->mail_encryption = trim($request->mail_encryption);
        $smtp->mail_from_address = trim($request->mail_from_address);
        $smtp->save();

        return redirect()->back()->with('success','SMTP successfully Updated');

     }


     public function payment_setting() {
          $data['getRecord'] = PaymentSetting::findOrFail(1);
        $data['header_title'] = 'Payment setting';
        return view('backend.setting.payment-setting',$data);
     }


     public function update_payment_setting(Request $request) {
          $paymentSetting = PaymentSetting::findOrFail(1);
          $paymentSetting->paypal_id = trim($request->paypal_id);
          $paymentSetting->paypal_status = trim($request->paypal_status);
          $paymentSetting->stripe_public_key = trim($request->stripe_public_key);
          $paymentSetting->stripe_secret_key = trim($request->stripe_secret_key);
          $paymentSetting->is_cash_delivery = !empty($request->is_cash_delivery) ? 1 : 0;
          $paymentSetting->is_paypal = !empty($request->is_paypal) ? 1 : 0;
          $paymentSetting->is_stripe = !empty($request->is_stripe) ? 1 : 0;
          $paymentSetting->save();

          return redirect()->back()->with('success','Payment Setting Successfully Updated');
     }
}
