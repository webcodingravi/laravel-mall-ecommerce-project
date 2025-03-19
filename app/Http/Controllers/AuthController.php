<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\RegisterMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function admin_login() {
        if(!empty(Auth::check() && Auth::user()->is_admin == 1)) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
     }


     public function AdminLoginProcess(Request $request) {
          $request->validate([
                'email' => 'required',
                'password' => 'required'
          ]);

          $remember = !(empty($request->remember)) ? true : false;

         if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => 1, 'status' => 1],$remember)) {
              return redirect()->route('dashboard');
         }else{
            Auth::logout();
            return redirect()->route('login')->with('error','Email and Password Not Match, Please try again.');
         }
     }



    public function logout() {
        Auth::logout();
        return redirect()->route('home');
    }


    public function user_register(Request $request) {
            $validator = Validator::make($request->all(),[
                'name' => 'required',
                'email' => 'required|email|unique:users,email,',
                'password' => 'required',
                'confirm_password' => 'required|same:password'
            ]);

                if($validator->fails()) {
                   return response()->json([
                     'status' => false,
                     'error' => $validator->errors()
                   ]);

                }

                   $user = new User();
                   $user->name = trim($request->name);
                   $user->email = trim($request->email);
                   $user->password = Hash::make($request->password);
                   $user->save();

                   Mail::to($user->email)->send(new RegisterMail($user));
                   return response()->json([
                    'status' => true,
                    'message' => "Your Account Successfully Created, Please Verify your email address."
              ]);

    }

    public function verify_email($id) {
              $id = base64_decode($id);
              $user = User::findOrFail($id);
               $user->email_verified_at = date('Y-m-d H:i:s');
               $user->save();
               return redirect()->route('home')->with('success','Email Successfully Verified');
    }



    public function user_login(Request $request) {
        $validator = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
              'status' => false,
              'error' => $validator->errors()
            ]);
        }
       $remember = !empty($request->is_remember) ? true : false;
       if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1],$remember)) {

        if(!empty(Auth::user()->email_verified_at)) {
            return response()->json([
                'status' => true,
                'message' => 'Successfully Login'
             ]);
        }else{
              $user_id = Auth::user()->id;
              $user = User::findOrFail($user_id);
            Mail::to($user->email)->send(new RegisterMail($user));
            Auth::logout();
            return response()->json([
                'status' => false,
                'message' => 'Your Account Email Not Verified, Please check your email address.'
          ]);
        }

       }else{
        return response()->json([
              'status' => false,
              'message' => 'Please Enter Currect Email and password'
        ]);
       }
    }


    public function forgot_password() {
        $data['meta_title'] = 'Forgot Password';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        return view('auth.forgot-password',$data);
    }


    public function ProcessForgotPassword(Request $request) {
       $user = User::where('email',$request->email)->first();
       if(!empty($user)) {
          $user->remember_token = Str::random(30);
           $user->save();
           Mail::to($user->email)->send(new ForgotPasswordMail($user));
           return redirect()->back()->with('success','Please check your email and reset your password.');
       }else{
        return redirect()->back()->with('error','Email Not Found in the system');
       }
    }


    public function reset_password($token) {
        $data['meta_title'] = 'Reset Password';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

       $user = User::where('remember_token',$token)->first();
        if(!empty($user)) {
            $data['user'] = $user;
            return view('auth.reset',$data);
        }else{
          abort(404);
        }
    }

    public function ProcessResetPassword(Request $request, $token) {
            if($request->password == $request->confirm_password) {
                $user = User::where('remember_token',$token)->first();
                $user->password = Hash::make($request->password);
                $user->remember_token = Str::random(30);
                $user->email_verified_at = date('Y-m-d H:i:s');
                $user->save();
                return redirect()->route('home')->with('Password Successfully Reset');
            }else{
                 return redirect()->back()->with('error',"Password and Confirm Password does not Match");
            }
    }
}
