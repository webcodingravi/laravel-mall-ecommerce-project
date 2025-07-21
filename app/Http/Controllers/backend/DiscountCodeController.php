<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\DiscountCode;
use Illuminate\Http\Request;

class DiscountCodeController extends Controller
{
    public function index(Request $request) {
        $data['header_title'] = 'Discount Code List';
        $discountCodes = DiscountCode::latest()->paginate(10);
        $data['discountCodes'] = $discountCodes;
            return view('backend.discount-code.list',$data);
       }

     //live search
     public function search(Request $request) {
        if($request->ajax()) {
            $query = $request->get('query');
            $discountCodes = DiscountCode::latest()->where('name','like','%'.$query.'%')->get();
            return view('backend.discount-code.table',compact('discountCodes'))->render();

        }
     }


       public function create() {
        $data['header_title'] = 'Create Discount Code';
        return view('backend.discount-code.create',$data);
       }

       public function store(Request $request) {
            $request->validate([
                 'name' => 'required',
                 'percent_amount' => 'required',
                 'expiry_date' => 'required',
            ]);

            $discountCode = new DiscountCode();
            $discountCode->name = trim($request->name);
            $discountCode->type = trim($request->type);
            $discountCode->percent_amount = trim($request->percent_amount);
            $discountCode->expiry_date = trim($request->expiry_date);
            $discountCode->status = trim($request->status);
            $discountCode->save();

            return redirect()->route('discount.list')->with('success','Discount Coupon Successfully Created.');

       }

       public function edit(string $id) {
        $data['header_title'] = 'Edit Discount Code';
        $data['discountCode'] = DiscountCode::findOrFail($id);
        return view('backend.discount-code.edit',$data);

       }


       public function update(Request $request, string $id) {
        $request->validate([
            'name' => 'required',
            'percent_amount' => 'required',
            'expiry_date' => 'required',
       ]);

       $discountCode = DiscountCode::findOrFail($id);
       $discountCode->name = trim($request->name);
       $discountCode->type = trim($request->type);
       $discountCode->percent_amount = trim($request->percent_amount);
       $discountCode->expiry_date = trim($request->expiry_date);
       $discountCode->status = trim($request->status);
       $discountCode->save();

       return redirect()->route('discount.list')->with('success','Discount Coupon Successfully Updated');

       }


       public function destroy(string $id) {
        $discountCode = DiscountCode::findOrFail($id);
        $discountCode->delete();

        return redirect()->back()->with('success','Discount Coupon Deleted Successfully');

       }

}