<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function getLogin() {
        return view('admin.Auth.login');
    }

################## Move To LoginRequests #####################
//    public function Login(Request $request) {
//
//        //Make Validation
//        $messages = [
//            'email.required'=>'البريد الإلكتروني مطللوب',
//            'email.email'=>'أدخل بريد إلكتروني صحيح',
//            'password.required'=>'كلمة المرور مطلوبة',
//
//        ];
//
//        $validator = Validator::make($request->all(),[
//            'email'=> 'required|email',
//            'password' => 'required',
//            ],$messages);
//
//        if($validator->filse()) {
//            notify()->error('هناك خطأ، الرجاء المحاولة مجدداً');
//            return redirect()->back()->withErrors($validator)->withInput($request->all());
//        }
//
//
//    }

    public function Login(LoginRequest $request) {
        $remember_me = $request->has('remember_me') ? true : false;
        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            // notify()->success('تم تسجيل الدخول بنجاح');
            return redirect() -> route('admin.dashboard');
        }
        // notify()->error('خطا في البيانات  برجاء المجاولة مجدا ');
        return redirect()->back()->with(['error' => 'يوجد خطأ في البيانات']);


    }


    }
