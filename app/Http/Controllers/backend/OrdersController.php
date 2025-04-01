<?php

namespace App\Http\Controllers\backend;


use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\OrderStatusMail;
use Illuminate\Support\Facades\Mail;

class OrdersController extends Controller
{
   public function index(Request $request) {
    $data['header_title'] = 'Orders List';
      $orders = Order::query();
      if(!empty($request->get('query'))) {
        $orders = $orders->where('first_name','like','%'.$request->get('query').'%');
        $orders = $orders->orWhere('last_name','like','%'.$request->get('query').'%');
        $orders = $orders->orWhere('email','like','%'.$request->get('query').'%');
        $orders = $orders->orWhere('phone','like','%'.$request->get('query').'%');
        $orders = $orders->orWhere('company_name','like','%'.$request->get('query').'%');
        $orders = $orders->orWhere('country','like','%'.$request->get('query').'%');
        $orders = $orders->orWhere('state','like','%'.$request->get('query').'%');
        $orders = $orders->orWhere('discount_code','like','%'.$request->get('query').'%');
        $orders = $orders->orWhere('payment_method','like','%'.$request->get('query').'%');

      }

      if(!empty($request->get('from')) && !empty($request->get('to'))) {
        $orders = $orders->where('created_at','>=',$request->get('from'));
        $orders = $orders->where('updated_at','<=',$request->get('to'));
      }



      $orders = $orders->where('is_payment',1);
      $orders = $orders->orderBy('id','desc');
      $orders = $orders->paginate(10);

      $data['orders'] = $orders;

      return view('backend.orders.list',$data);

   }

   public function details(string $id) {
         $data['header_title'] = 'Order Detail';
         $data['orders'] = Order::findOrFail($id);
         return view('backend.orders.detail',$data);
   }





   public function order_status(Request $request) {
    $getOrder = Order::findOrfail($request->order_id);
    $getOrder->status = $request->status;
    $getOrder->save();

    Mail::to($getOrder->email)->send(new OrderStatusMail($getOrder));
    return response()->json([
            'status' => true,
            'message' => 'Status Successfully Updated',
    ]);
   }


   public function destory(string $id) {
    $order = Order::findOrFail($id);
   $order->delete();
   return redirect()->back()->with('success','Order Successfully Deleted');
}
}
