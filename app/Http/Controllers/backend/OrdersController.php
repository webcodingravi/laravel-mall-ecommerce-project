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

//    live search
 public function search(Request $request) {
    if($request->ajax()) {
      $query = $request->get('query');
      $orders = Order::latest()->where('first_name','like','%'.$query.'%')
      ->orWhere('last_name','like','%'.$query.'%')
      ->orWhere('order_number','like','%'.$query.'%')
      ->orWhere('company_name','like','%'.$query.'%')
      ->get();
      return view('backend.orders.table',compact('orders'))->render();
    }
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