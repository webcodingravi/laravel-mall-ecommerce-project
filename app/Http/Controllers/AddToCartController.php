<?php

namespace App\Http\Controllers;

use App\Mail\OrderInvoiceMail;
use Stripe\Stripe;
use App\Models\User;
use App\Models\Color;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\ProductSize;
use App\Models\DiscountCode;
use Illuminate\Http\Request;
use App\Models\ShippingCharge;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Surfsidemedia\Shoppingcart\Facades\Cart;


class AddToCartController extends Controller
{
    public function cart(Request $request) {
        $data['meta_title'] = 'Cart';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        return view('add_to_cart.cart',$data);

    }


    public function CartDelete(string $id) {
               Cart::remove($id);
               return redirect()->back()->with('success','Cart Successfully Deleted.');
    }

    public function AddToCart(Request $request) {

       $getProduct = Product::findOrFail($request->product_id);
       $total = $getProduct->price;
         if(!empty($request->size_id)) {
            $size_id = $request->size_id;
            $getSize = ProductSize::findOrFail($size_id);

            $size_price = !empty($getSize->price) ? $getSize->price : 0;
            $total = $total + $size_price;
         }else{
            $size_id = 0;
         }

         $color_id = !empty($request->color_id) ? $request->color_id : 0;
         Cart::add([
                'id' => $getProduct->id,
                'name' => 'Product',
                'price' => $total,
                'qty' => $request->qty,
                'options' => array(
                   'size_id' => $size_id,
                   'color_id' => $color_id,
                )
           ]);

           return redirect()->back()->with('success','Cart Successfully Added.');


         }


         public function CartUpdate(Request $request) {
              foreach($request->cart as $cart) {
                Cart::update($cart['rowId'],$cart['qty']);
              }

              return redirect()->back()->with('success','Cart Successfully Updated.');
         }


         public function checkout() {
            $data['meta_title'] = 'Checkout';
            $data['meta_description'] = '';
            $data['meta_keywords'] = '';
            $data['getShipping'] = ShippingCharge::where('status',1)->orderBy('id','desc')->get();
            return view('add_to_cart.checkout',$data);
         }


         public function ApplyDiscountCode(Request $request) {
             $getDiscount = DiscountCode::where('name',$request->discount_code)
             ->where('expiry_date', '>', date('Y-m-d'))
             ->where('status',1)
             ->first();

             if(!empty($getDiscount)) {
                $total = Cart::subtotal();
                if($getDiscount->type == 'Amount') {
                   $discount_amount = $getDiscount->percent_amount;
                   $payable_total = $total - $getDiscount->percent_amount;
                }else{
                    $discount_amount = ($total * $getDiscount->percent_amount) / 100;
                    $payable_total = $total - $discount_amount;
                }
                return response()->json([
                    'status' => true,
                    'discount_amount' =>number_format($discount_amount,2),
                    'payable_total' =>$payable_total,
                    'message' => 'Successfully Apply Discount Code'
               ]);

             }else{
                return response()->json([
                     'status' => false,
                     'discount_amount' => '0.00',
                    'payable_total' => Cart::subtotal(),
                     'message' => 'Discount Code Invalid'
                ]);
             }
         }


         public function PlaceOrder(Request $request) {
            $validator = Validator::make($request->all(),[
                        'first_name' => 'required',
                       'last_name' => 'required',
                       'country' => 'required',
                       'city' => 'required',
                       'state' => 'required',
                       'postcode' => 'required',
                       'phone' => 'required',
                       'email' => 'required|email',
            ]);
                if($validator->fails()) {
                    return response()->json([
                           'status' => false,
                           'errors' => $validator->errors()
                    ]);
                }

                 $validate = 0;
                 if(!empty(Auth::check())) {
                      $user_id = Auth::user()->id;
                 }else{
                    if(!empty($request->is_create)) {
                        $checkMail = User::where('email',$request->email)->first();
                          if(!empty($checkMail)) {
                               return response()->json([
                                 'status' => false,
                                 'message' => 'This email already register please choose another',
                                 $validate = 1
                               ]);
                          }else{
                              $user = new User();
                              $user->name = trim($request->first_name);
                              $user->email = trim($request->email);
                              $user->password = Hash::make($request->password);
                              $user->save();

                              $user_id = $user->id;
                          }
                          }else{
                              $user_id = '';
                          }

                 }


                 if(empty($validate)) {
                    $getShipping = ShippingCharge::findOrFail($request->shipping_id);
                    $payable_total = Cart::subtotal();
                    $discount_amount = 0;
                    $discount_code = '';
                    if(!empty($request->discount_code)) {
                       $getDiscount = DiscountCode::where('name',$request->discount_code)
                       ->where('expiry_date', '>', date('Y-m-d'))
                       ->where('status',1)
                       ->first();

                           if(!empty($getDiscount)) {
                               $discount_code = $request->discount_code;
                              if($getDiscount->type == 'Amount') {
                                   $discount_amount = $getDiscount->percent_amount;
                                   $payable_total = $payable_total - $getDiscount->percent_amount;
                              }else{
                               $discount_amount = ($payable_total * $getDiscount->percent_amount) / 100;
                               $payable_total = $payable_total - $discount_amount;
                              }
                           }
                    }


                    $shipping_amount = !empty($getShipping->price) ? $getShipping->price : 0;
                    $payable_amount = $payable_total + $shipping_amount;


                   $order = new Order();
                   if(!empty($user_id)) {
                    $order->user_id = trim($user_id);
                   }
                   $order->order_number = mt_rand(1000000000,99999999);
                   $order->first_name = trim($request->first_name);
                   $order->last_name = trim($request->last_name);
                   $order->company_name = trim($request->company_name);
                   $order->country = trim($request->country);
                   $order->address_one = trim($request->address_one);
                   $order->address_two = trim($request->address_two);
                   $order->city = trim($request->city);
                   $order->state = trim($request->state);
                   $order->postcode = trim($request->postcode);
                   $order->phone = trim($request->phone);
                   $order->email = trim($request->email);
                   $order->note = trim($request->note);
                   $order->discount_amount = trim($discount_amount);
                   $order->discount_code = trim($discount_code);
                   $order->shipping_id = trim($request->shipping_id);
                   $order->shipping_amount = trim($shipping_amount);
                   $order->total_amount = trim($payable_amount);
                   $order->payment_method= trim($request->payment_method);
                   $order->save();

                   foreach(Cart::content() as $cart) {
                       $order_item = new OrderItem();
                       $order_item->order_id = $order->id;
                       $order_item->product_id = $cart->id;
                       $order_item->quantity = $cart->qty;
                       $order_item->price = $cart->price;

                       $color_id = $cart->options->color_id;
                       if(!empty($color_id)) {
                           $getColor = Color::findOrFail($color_id);
                           $order_item->color_name = $getColor->name;
                       }
                       $size_id = $cart->options->size_id;
                       if(!empty($size_id)) {
                           $getSize = ProductSize::findOrFail($size_id);
                           $order_item->size_name = $getSize->size;
                           $order_item->size_amount = $getSize->price;
                       }

                       $order_item->total_price = $cart->price;
                       $order_item->save();
                   }
                   return response()->json([
                    'status' => true,
                    'message' => 'Success',

                    'redirect' => route('checkout_payment','order_id='.base64_encode($order->id)),
               ]);
                 }else{
                    return response()->json([
                         'status' => false,
                         'message' => 'This email already register please choose another'
                    ]);
                 }
         }





         public function checkout_payment(Request $request) {
           if(!empty(Cart::subtotal()) && !empty($request->order_id)) {
                $order_id = base64_decode($request->order_id);
                $getOrder = Order::findOrfail($order_id);
                if(!empty($getOrder)) {
                   if($getOrder->payment_method == 'cash') {
                        $getOrder->is_payment = 1;
                        $getOrder->save();

                        Mail::to($getOrder->name)->send(new OrderInvoiceMail($getOrder));

                        Cart::destroy();
                        return redirect()->route('cart')->with('success','Order Successfully placed');

                   }else if($getOrder->payment_method == 'paypal'){
                          $quary                  = array();
                          $quary['business']      = "vipulbusiness1@gmail.com";
                          $quary['cmd']           = '_xclick';
                          $quary['item_name']     = "E-commerce";
                          $quary['no_shipping']   = '1';
                          $quary['item_number']   = $getOrder->id;
                          $quary['amount']        = $getOrder->total_amount;
                          $quary['currency_code'] = 'USD';
                          $query['cancel_return'] = url('/checkout');
                          $quary['return']        = url('/paypal/success-payment');

                          $quary_string = http_build_query($quary);


                          header('Location: https://www.sandbox.paypal.com?'.$quary_string);

                          exit();

                   }else if($getOrder->payment_method == 'stripe') {
                        Stripe::setApiKey(env('STRIPE_SECRET'));
                        $finalprice = $getOrder->total_amount * 100;
                        $session = \Stripe\Checkout\Session::create([
                             'customer_email' => $getOrder->email,
                             'payment_method_types' => ['card'],
                             'line_items' => [[
                                'price_data' => [
                                    'currency' => 'usd',
                                    'product_data' => [
                                        'name' => 'E-Commerce',
                                    ],
                                    'unit_amount' => intval($finalprice),
                                ],
                                'quantity' => 1,
                             ]],
                             'mode' => 'payment',
                             'success_url' => url('/stripe/payment-success'),
                             'cancel_url' => url('/checkout'),
                        ]);

                        $getOrder->stripe_session_id = $session['id'];
                        $getOrder->save();

                        $data['session_id'] = $session['id'];
                        Session::put('stripe_session_id',$session['id']);
                        $data['setPublicKey'] =  env('STRIPE_KEY');

                        return view('add_to_cart.stripe_charge',$data);

                   }
                }else{
                    abort(404);
                }
           }else{
            abort(404);
           }
         }


         public function paypalSuccessPayment(Request $request) {
               if(!empty($request->item_number) && !empty($request->st) && $request->st == "Completed") {
                $getOrder = Order::findOrfail($request->item_number);
                if(!empty($getOrder)) {
                    $getOrder->is_payment = 1;
                    $getOrder->payment_data = json_encode($request->all());
                    $getOrder->transaction_id = $request->tx;
                        $getOrder->save();
                        Mail::to($getOrder->name)->send(new OrderInvoiceMail($getOrder));
                        Cart::destroy();
                        return redirect()->route('cart')->with('success','Order Successfully placed');
                }else{
                    abort(404);
                }
               }else{
                   abort(404);
               }
         }


         public function stripeSuccessPayment() {
              $trans_id = Session::get('stripe_session_id');
              \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
              $getdata = \Stripe\checkout\Session::retrieve($trans_id);

              $getOrder = Order::where('stripe_session_id',$getdata->id)->first();

              if(!empty($getOrder) && !empty($getdata->id) && $getdata->id == $getOrder->stripe_session_id) {
                $getOrder->is_payment = 1;
                $getOrder->payment_data = json_encode($getdata);
                $getOrder->transaction_id = $getdata->id;
                    $getOrder->save();
                    Cart::destroy();
                    return redirect()->route('cart')->with('success','Order Successfully placed');
              }else{
                return redirect()->route('cart')->with('error','Due to some error please try agian');
              }
         }
    }
