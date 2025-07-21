<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ShippingCharge;
use Illuminate\Http\Request;

class ShippingChargeController extends Controller
{
    public function index() {
        $data['header_title'] = 'Shipping Charge List';
        $ShippingCharges = ShippingCharge::latest()->paginate(10);
        $data['ShippingCharges'] = $ShippingCharges;
            return view('backend.shipping-charge.list',$data);
       }

    //    live search
       public function search(Request $request) {
          if($request->ajax()) {
            $query = $request->get('query');
            $ShippingCharges = ShippingCharge::latest()->where('name','like','%'.$query.'%')->get();
            return view('backend.shipping-charge.table',compact('ShippingCharges'))->render();
          }
       }

       public function create() {
        $data['header_title'] = 'Create Shipping Charge';
        return view('backend.shipping-charge.create',$data);
       }

       public function store(Request $request) {
            $request->validate([
                 'name' => 'required',
                 'price' => 'required',
            ]);

            $ShippingCharge = new ShippingCharge();
            $ShippingCharge->name = trim($request->name);
            $ShippingCharge->price = trim($request->price);
            $ShippingCharge->status = trim($request->status);
            $ShippingCharge->save();

            return redirect()->route('shipping.list')->with('success','Shipping Charge Successfully Created.');

       }

       public function edit(string $id) {
        $data['header_title'] = 'Edit Shipping Charge';
        $data['ShippingCharge'] = ShippingCharge::findOrFail($id);
        return view('backend.shipping-charge.edit',$data);

       }


       public function update(Request $request, string $id) {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
       ]);

       $ShippingCharge = ShippingCharge::findOrFail($id);
       $ShippingCharge->name = trim($request->name);
       $ShippingCharge->price = trim($request->price);
       $ShippingCharge->status = trim($request->status);
       $ShippingCharge->save();

       return redirect()->route('shipping.list')->with('success','Shipping Charge Successfully Updated');

       }


       public function destroy(string $id) {
        $ShippingCharge = ShippingCharge::findOrFail($id);
        $ShippingCharge->delete();

        return redirect()->back()->with('success','Shipping Charge Deleted Successfully');

       }
}
