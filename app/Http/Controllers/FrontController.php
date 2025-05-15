<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Page;
use App\Models\Slider;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Category;
use App\Models\ContactUs;
use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use App\Models\SystemSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class FrontController extends Controller
{
   public function home() {
     $data['meta_title'] = 'Ecomerce';
     $data['meta_description'] = '';
     $data['meta_keywords'] = '';
     $data['getSlider'] = Slider::where('status',1)->orderBy('id','asc')->get();
    $data['getPartner'] = Partner::where('status',1)->orderBy('created_at','asc')->get();
    $data['getCategoryHome'] = Category::where('is_home',1)->where('status',1)->orderBy('id','asc')->get();
    $data['getProduct'] = Product::select('products.*','categories.name as category_name',
    'categories.slug as category_slug', 'sub_categories.name as SubCategory_name', 'sub_categories.slug as SubCategory_slug')
    ->join('categories','categories.id','products.category_id')
    ->join('sub_categories','sub_categories.id','products.sub_category_id')
      ->orderBy('products.id','desc')
      ->where('products.status',1)
     ->take(8)
     ->get();
      return view('home',$data);
   }


   public function ArrivalProduct(Request $request) {
    $getProduct = Product::select('products.*','categories.name as category_name',
    'categories.slug as category_slug', 'sub_categories.name as SubCategory_name', 'sub_categories.slug as SubCategory_slug')
    ->join('categories','categories.id','products.category_id')
    ->join('sub_categories','sub_categories.id','products.sub_category_id');
    if(!empty($request->category_id)) {
         $getProduct = $getProduct->where('products.category_id','=',$request->category_id);
    }
    $getProduct = $getProduct->orderBy('products.id','desc')
      ->where('products.status',1)
     ->take(8)
     ->get();


     $getCategory = Category::findOrFail($request->category_id);

     return response()->json([
        'status' => true,
        'success' => view('product.list_recent_arrival',[
                'getProduct' => $getProduct,
                'getCategory' => $getCategory
        ])->render()

        ],200);
   }




   public function About() {
    $about = Page::where('slug','about-us')->first();
    if(!empty($about)) {
        $data['meta_title'] = $about->meta_title;
        $data['meta_description'] = $about->meta_description;
        $data['meta_keywords'] = $about->meta_keywords;
        $data['about'] = $about;
        return view('pages.about',$data);
    }else{
        abort(404);
    }


   }


   public function Contact() {
    $contact = Page::where('slug','contact-us')->first();
    if(!empty($contact)) {
        $data['meta_title'] = $contact->meta_title;
        $data['meta_description'] = $contact->meta_description;
        $data['meta_keywords'] = $contact->meta_keywords;
        $data['contact'] = $contact;

        $first_number = mt_rand(0,9);
        $second_number = mt_rand(0,9);
        Session::put('total_sum',$first_number + $second_number);
        $data['first_number'] = $first_number;
        $data['second_number'] = $second_number;


        return view('pages.contact',$data);
    }else{
        abort(404);
    }


   }

   public function SubmitContact(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        if(!empty(Session::get('total_sum')) && !empty($request->verification)) {
            if(trim(Session::get('total_sum')) == trim($request->verification)){
                $contact = new ContactUs();
                if(!empty(Auth::check())) {
                   $contact->user_id = Auth::user()->id;
                }
                $contact->name = trim($request->name);
                $contact->email = trim($request->email);
                $contact->phone = trim($request->phone);
                $contact->subject = trim($request->subject);
                $contact->message = trim($request->message);
                $contact->save();
               $getSystemSetting = SystemSetting::findOrFail(1);

                Mail::to($getSystemSetting->submit_email)->send(new ContactUsMail($contact));
                return redirect()->back()->with('success','Your Information Successfully Send.');

            }else{
                return redirect()->back()->with('error','Your Verification sum is wrong.');

            }
        }else{
            return redirect()->back()->with('error','Your Verification sum is wrong.');

        }




   }

   public function Faq() {
    $data['meta_title'] = 'Faq';
    $data['meta_description'] = '';
    $data['meta_keywords'] = '';
    $data['getFaq']= Faq::where('status',1)->orderBy('created_at','desc')->get();
    return view('pages.faq',$data);
   }


   public function PaymentMethod() {
    $PaymentMethod = Page::where('slug','payment-methods')->first();
    if(!empty($PaymentMethod)) {
        $data['meta_title'] = $PaymentMethod->meta_title;
        $data['meta_description'] = $PaymentMethod->meta_description;
        $data['meta_keywords'] = $PaymentMethod->meta_keywords;
        $data['PaymentMethod'] = $PaymentMethod;
        return view('pages.payment-method',$data);
    }else{
        abort(404);
    }

   }

   public function MoneyBack() {
    $MoneyBack = Page::where('slug','money-back-guarantee')->first();
    if(!empty($MoneyBack)) {
        $data['meta_title'] = $MoneyBack->meta_title;
        $data['meta_description'] = $MoneyBack->meta_description;
        $data['meta_keywords'] = $MoneyBack->meta_keywords;
        $data['MoneyBack'] = $MoneyBack;
        return view('pages.money-back',$data);
    }else{
        abort(404);
    }

   }



   public function Returns() {
    $returns = Page::where('slug','returns')->first();
    if(!empty($returns)) {
        $data['meta_title'] = $returns->meta_title;
        $data['meta_description'] = $returns->meta_description;
        $data['meta_keywords'] = $returns->meta_keywords;
        $data['returns'] = $returns;
        return view('pages.returns',$data);
    }else{
        abort(404);
    }

   }


   public function Shipping() {
    $shipping = Page::where('slug','shipping')->first();
    if(!empty($shipping)) {
        $data['meta_title'] = $shipping->meta_title;
        $data['meta_description'] = $shipping->meta_description;
        $data['meta_keywords'] = $shipping->meta_keywords;
        $data['shipping'] = $shipping;
        return view('pages.shipping',$data);
    }else{
        abort(404);
    }

   }

   public function TermsConditions() {
    $TermsConditins = Page::where('slug','terms-conditions')->first();
    if(!empty($TermsConditins)) {
        $data['meta_title'] = $TermsConditins->meta_title;
        $data['meta_description'] = $TermsConditins->meta_description;
        $data['meta_keywords'] = $TermsConditins->meta_keywords;
        $data['TermsConditins'] = $TermsConditins;
        return view('pages.terms-conditions',$data);
    }else{
        abort(404);
    }

   }


   public function PrivacyPolicy() {
    $PrivacyPolicy = Page::where('slug','privacy-policy')->first();
    if(!empty($PrivacyPolicy)) {
        $data['meta_title'] = $PrivacyPolicy->meta_title;
        $data['meta_description'] = $PrivacyPolicy->meta_description;
        $data['meta_keywords'] = $PrivacyPolicy->meta_keywords;
        $data['PrivacyPolicy'] = $PrivacyPolicy;
        return view('pages.privacy-policy',$data);
    }else{
        abort(404);
    }

   }
}
