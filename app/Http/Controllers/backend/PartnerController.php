<?php

namespace App\Http\Controllers\backend;

use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PartnerController extends Controller
{
    public function index(Request $request) {
        $data['header_title'] = 'Partner List';
        $partners = Partner::orderBy('id','desc')->paginate(10);
        $data['partners'] = $partners;
       return view('backend.partner.list',$data);
    }

    public function create() {
        $data['header_title'] = 'Partner Create';
        return view('backend.partner.create',$data);

    }

    public function store(Request $request) {
        $request->validate([
           'image_name' => 'image'
        ]);

        $image = $request->image_name;
        $ext = $image->getClientOriginalExtension();
        $ImageName = time().'.'.$ext;
        $image->move(public_path('uploads/partner_logo/'),$ImageName);

        $partner = new Partner();
        $partner->image_name = $ImageName;
        $partner->link = trim($request->link);
        $partner->status = trim($request->status);
        $partner->save();
         return redirect()->route('partner.list')->with('success','New Partner Successfully Added');
    }


    public function edit(string $id) {
        $data['partner'] = Partner::findOrFail($id);
        $data['header_title'] = 'Edit Partner';
        return view('backend.partner.edit',$data);
    }

    public function update(Request $request, string $id) {
        $request->validate([
            'image_name' => 'image'
         ]);

         $partner = Partner::findOrFail($id);
         $partner->link = trim($request->link);
         $partner->status = trim($request->status);
         $partner->save();

         if(!empty($request->image_name)) {
            // old image deleted
            File::delete('uploads/partner_logo/'.$partner->image_name);
            $image = $request->image_name;
            $ext = $image->getClientOriginalExtension();
            $ImageName = time().'.'.$ext;
            $image->move(public_path('uploads/partner_logo/'),$ImageName);
            $partner->image_name = $ImageName;
            $partner->save();
         }
         return redirect()->route('partner.list')->with('success','Partner Successfully Updated.');
    }


    public function destroy(string $id) {
        $partner = Partner::findOrFail($id);
        $partner->delete();
        return redirect()->back()->with('success','Partner Successfully Deleted');

    }
}
