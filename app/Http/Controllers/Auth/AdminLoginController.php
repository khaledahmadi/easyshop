<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class AdminLoginController extends Controller
{

public function __construct(){
  $this->middleware('guest:admin', ['except' => ['logout']]);
}

    public function showLoginForm(){
      return view('auth.admin-login');
    }
    public function login(Request $request){
      // valid the form
      $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|min:6'
      ]);
      //Attemps to login the user
      if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
        // if success then redirect to a dashboard
        return redirect()->intended(route('product.store'));
      }
      // if fail display an error message
      return redirect()->back()->withInput($request->only('email','remember'));
    }

    //logout function for admin
    public function logout(){
      Auth::guard('admin')->logout();
      redirect('/');
    }
}
