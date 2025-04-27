<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\ProductReview;
use App\Models\ProductWishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function dashboard() {
        $data['meta_title'] = 'Dashboard';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        $data['TotalOrder'] = Order::where('is_payment',1)->where('user_id',Auth::user()->id)->count();

        $data['TotalTodayOrder'] = Order::where('is_payment',1)->where('user_id',Auth::user()->id)
        ->whereDate('created_at',date('Y-m-d'))->count();

        $data['TotalAmount'] = Order::where('is_payment',1)->where('user_id',Auth::user()->id)->sum('total_amount');

        $data['TotalTodayAmount'] = Order::where('is_payment',1)->where('user_id',Auth::user()->id)
        ->whereDate('created_at',date('Y-m-d'))->count('total_amount');

        $data['PendingOrder'] = Order::where('is_payment',1)
        ->where('user_id',Auth::user()->id)
        ->where('status',0)
        ->count();

        $data['InProgressOrder'] = Order::where('is_payment',1)
        ->where('user_id',Auth::user()->id)
        ->where('status',1)
        ->count();

        $data['CompletedOrder'] = Order::where('is_payment',1)
        ->where('user_id',Auth::user()->id)
        ->where('status',3)
        ->count();

        $data['CancelledOrder'] = Order::where('is_payment',1)
        ->where('user_id',Auth::user()->id)
        ->where('status',4)
        ->count();

       return view('User-account.dashboard',$data);
    }


    public function orders() {
        $data['meta_title'] = 'Orders';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        $data['orders'] = Order::where('user_id',Auth::user()->id)
        ->where('is_payment',1)
        ->orderBy('id','desc')->paginate(10);
        return view('User-account.orders',$data);
    }

    public function user_order_details(string $id) {
        $data['meta_title'] = 'Orders Detail';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        $data['orders'] = Order::where('user_id',Auth::user()->id)
        ->where('is_payment',1)
        ->where('id',$id)
        ->first();
        return view('User-account.order-detail',$data);
    }


    public function EditProfile() {
        $data['meta_title'] = 'Edit Profile';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        $data['getRecord'] = User::findOrFail(Auth::user()->id);
       return view('User-account.edit-profile',$data);
    }

    public function UpdateProfile(Request $request) {
        $user = User::findOrFail(Auth::user()->id);
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->email = trim($request->email);
        $user->phone = trim($request->phone);
        $user->company_name = trim($request->company_name);
        $user->country = trim($request->country);
        $user->address_one = trim($request->address_one);
        $user->address_two = trim($request->address_two);
        $user->city = trim($request->city);
        $user->state = trim($request->state);
        $user->postcode = trim($request->postcode);
        $user->save();

        return redirect()->back()->with('success','Profile Successfully Updated.');

    }


    public function ChangePassword() {
        $data['meta_title'] = 'Change Password';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
       return view('User-account.change-password',$data);
    }


    public function UpdatePassword(Request $request) {
          $user = User::findOrFail(Auth::user()->id);
          if(Hash::check($request->old_password,$user->password)) {
             if($request->new_password == $request->confirm_password) {
                     $user->password = Hash::make($request->new_password);
                     $user->save();
                     return redirect()->back()->with('success','Password Successfully Updated');
             }else{
                return redirect()->back()->with('error','New Password and Confirm Password does not match');
             }
          }else{
             return redirect()->back()->with('error','Old Password is not correct');
          }
    }

    public function AddToWishlist(Request $request) {
        $check = ProductWishlist::where(['user_id'=>Auth::user()->id,'product_id' =>$request->product_id])->count();
        if(empty($check)) {
            $wishlist = new ProductWishlist();
            $wishlist->product_id = $request->product_id;
            $wishlist->user_id = Auth::user()->id;
            $wishlist->save();
            return response()->json([
                'is_wishlist' => 1
             ]);
        }else{
             ProductWishlist::where(['user_id' =>Auth::user()->id,'product_id'=>$request->product_id])->delete();
             return response()->json([
                'is_wishlist' => 0
             ]);
        }


          return response()->json([
             'status' => true,
          ]);

        }

        public function MakeReview(Request $request) {
           $review = new ProductReview();
           $review->product_id = trim($request->product_id);
           $review->order_id = trim($request->order_id);
           $review->user_id = Auth::user()->id;
           $review->rating = trim($request->rating);
           $review->review = trim($request->review);
           $review->save();

           return redirect()->back()->with('success','Thank you for your review');
        }
}
