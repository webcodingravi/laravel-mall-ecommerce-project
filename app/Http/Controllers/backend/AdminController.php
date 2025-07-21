<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $request) {
       $data['header_title'] = 'Admin List';

       $getAdmins = User::latest()
       ->where('is_admin',1)
       ->paginate(10);

     $data['getAdmins'] = $getAdmins;
       return view('backend.admin.list',$data);
    }

    // live search admin
    public function search(Request $request) {
        if($request->ajax()) {
        $query = $request->get('query');
        $getAdmins = User::latest()->where('name','like','%'.$query.'%')->get();
        return view('backend.admin.table',compact('getAdmins'))->render();

        }
}

    public function create() {
        return view('backend.admin.create');
    }


    public function store(Request $request) {
          $request->validate([
                 'name' => 'required',
                 'email' => 'required|email|unique:users,email',
                  'password' => 'required',
                  'confirm_password' => 'required|same:password',
                  'image' => 'image'
          ]);

          $admin = new User();
          $admin->name = trim($request->name);
          $admin->email = trim($request->email);
          $admin->password = Hash::make($request->password);
          $admin->is_admin = 1;
          $admin->status = trim($request->status);
          $admin->save();

          if(!empty($request->image)) {
             $image = $request->image;
             $ext = $image->getClientOriginalExtension();
             $ImageName = time().'.'.$ext;
             $image->move(public_path('uploads/profile_pic/'),$ImageName);
             $admin->image = $ImageName;
             $admin->save();
          }

         return redirect()->route('admin.list')->with('success','New Admin Created Successfully.');
    }

    public function edit(string $id) {
        $data['header_title'] = 'Edit Admin';
        $data['getAdmin'] = User::findOrFail($id);
        return view('backend.admin.edit',$data);
    }

    public function update(Request $request, string $id) {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id.',',
             'image' => 'image'
     ]);

        $admin = User::findOrFail($id);
        $admin->name = trim($request->name);
        $admin->email = trim($request->email);
        $admin->is_admin = 1;
        if(!empty($request->password)) {
            $admin->password = Hash::make($request->password);
        }
        $admin->status = trim($request->status);
        $admin->save();

        if(!empty($request->image)) {
            // old Image Deleted
            File::delete(public_path('uploads/profile_pic/'.$admin->image));

            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $ImageName = time().'.'.$ext;
            $image->move(public_path('uploads/profile_pic/'),$ImageName);
            $admin->image = $ImageName;
            $admin->save();
     }
     return redirect()->route('admin.list')->with('success','Admin Updated Successfully.');

    }

    public function destroy(string $id) {
        $admin = User::findOrFail($id);
        $admin->delete();
        // old Image Deleted
        File::delete(public_path('uploads/profile_pic/'.$admin->image));
        return redirect()->back()->with('success','Admin Deleted Successfully.');

    }



    // customer list controller

    public function customer_list(Request $request) {
        $data['header_title'] = 'Customer List';
        $getCustomer = User::latest()
        ->where('is_admin',0)
        ->paginate(10);
        $data['getCustomer'] = $getCustomer;
        return view('backend.customer.list',$data);
     }


     public function customer_delete(string $id) {
        $customer = User::findOrFail($id);
        $customer->delete();
        // old Image Deleted
        File::delete(public_path('uploads/profile_pic/'.$customer->image));
        return redirect()->back()->with('success','Customer Successfully Deleted .');

    }




    // customer search
    public function customer_search(Request $request) {
        if($request->ajax()) {
          $query = $request->get('query');
          $getCustomer = User::where('name','like','%'.$query.'%')->get();
          return view('backend.customer.table',compact('getCustomer'))->render();
        }
    }
    }
