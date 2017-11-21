<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Checkout;
use App\Product;
use App\User;
use Auth;
use Session;
use Illuminate\Support\FacadeS\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index()
    { 	
		$user_id=auth()->user()->id;
		$user_pro=Checkout::where('user_id', $user_id)->get();
        return view('profile.myprofile', compact('user_pro'));
    }
	
	public function edit(Request $request, $id){
		$profile=Checkout::find($id);
		$profile->name = $request->name;
		$profile->email = $request->email;
		$profile->phone = $request->phone;
		
		$profile->save();
		
		Session::flash('success', 'Profile Updated Successfully!');
		return redirect()->route('profile.index');
	}
	
	public function address()
    {
		$user_id=auth()->user()->id;
		$user_add=Checkout::where('user_id', $user_id)->get();
        return view('profile.myaddress', compact('user_add'));
    }
	
	public function address_edit(Request $request, $id){
		$profile=Checkout::find($id);
		$profile->address = $request->address;
		$profile->state = $request->state;
		$profile->city = $request->city;
		$profile->zip = $request->zip;
		
		$profile->save();
		
		Session::flash('success', 'Address Updated Successfully!');
		return redirect()->route('profile.myaddress');
	}
	
	public function order()
    {   
		$user_id=auth()->user()->id;
		$user_order=DB::table('order_product')->leftJoin('products', 'products.id', '=', 'order_product.product_id')->leftJoin('order', 'order.id', '=', 'order_product.order_id')->where('user_id', '=', $user_id)->get();
        return view('profile.orders',compact('user_order'));
    }
	
	public function password()
    {
		$user_id=auth()->user()->id;
		$user_add=User::where('id', $user_id)->get();
        return view('profile.changePassword', compact('user_add'));
    }
	
	public function password_edit(Request $request, $id){
		$profile=User::find($id);
		$old= $request->oldpass;
		if(!Hash::check($old, Auth::User()->password)){
			Session::flash('success', 'Password Not Matched!');
			return redirect()->route('profile.password');
		}
		else{
			$profile->password = Hash::make($request->newpass);
			$profile->save();
		
			Session::flash('success', 'Password Changed Successfully!');
			return redirect()->route('profile.password');
		}
	}
}
