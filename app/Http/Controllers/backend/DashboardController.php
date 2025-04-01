<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard(Request $request) {
        $data['TotalOrder'] = Order::where('is_payment',1)->count();
        $data['TotalTodayOrder'] = Order::where('is_payment',1)
        ->whereDate('created_at',date('Y-m-d'))->count();

        $data['TotalAmount'] = Order::where('is_payment',1)->sum('total_amount');

        $data['TotalTodayAmount'] = Order::where('is_payment',1)
        ->whereDate('created_at',date('Y-m-d'))->count('total_amount');

         $data['TotalCustomer'] = User::where('is_admin',0)->count();
         $data['TotalTodayCustomer'] = User::where('is_admin',0)
         ->where('created_at',date('Y-m-d'))->count();

         $data['getLatestOrders'] = Order::where('is_payment',1)
         ->orderBy('id','desc')->take(10)->get();

         if(!empty($request->get('year'))) {
              $year = $request->get('year');
         }else{
               $year = date('Y');
         }


         $getTotalCustomerMonth = '';

         $getTotalOrderMonth = '';

         $getTotalOrderAmountMonth = '';

         $totalAmount = 0;

         for($month = 1; $month <= 12; $month++) {
           $startDate = new \DateTime("$year-$month-01");
           $endDate = new \DateTime("$year-$month-01");
           $endDate->modify('last day of this month');

           $start_date = $startDate->format('Y-m-d');
           $end_date = $endDate->format('Y-m-d');

           $customer = User::where('is_admin',0)
           ->whereDate('created_at','>=',$start_date)
           ->whereDate('created_at','<=',$end_date)
           ->count();
           $getTotalCustomerMonth .= $customer.',';

           $order = Order::where('is_payment',1)
           ->whereDate('created_at','>=',$start_date)
           ->whereDate('created_at','<=',$end_date)
           ->count();
           $getTotalOrderMonth .= $order.',';

           $orderPayment = Order::where('is_payment',1)
           ->whereDate('created_at','>=',$start_date)
           ->whereDate('created_at','<=',$end_date)
           ->sum('total_amount');
           $getTotalOrderAmountMonth .=  $orderPayment.',';

           $totalAmount = $totalAmount + $orderPayment;


         }

          $data['getTotalCustomerMonth'] = rtrim($getTotalCustomerMonth,',');

          $data['getTotalOrderMonth'] = rtrim($getTotalOrderMonth,',');

          $data['getTotalOrderAmountMonth'] = rtrim($getTotalOrderAmountMonth,',');

          $data['totalAmount'] = $totalAmount;

          $data['year'] = $year;

        $data['header_title'] = 'Dashboard';
        return view('backend.dashboard',$data);
    }
}