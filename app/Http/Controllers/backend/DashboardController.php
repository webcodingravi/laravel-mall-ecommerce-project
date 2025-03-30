<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard() {
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

        $data['header_title'] = 'Dashboard';
        return view('backend.dashboard',$data);
    }
}
