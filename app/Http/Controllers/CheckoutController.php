<?php

namespace App\Http\Controllers;

use App\Checkout;
use App\Product;
use App\Order;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart; // for cart lib
use Session;
use App\WishList;
use Illuminate\Support\FacadeS\DB;
use Auth;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index()
    {	 $cartlist=Cart::content();
	 	 $user_id=auth()->user()->id;
		 $user=Checkout::where('user_id', $user_id)->get();
	     
	     if(isset($user[0]->user_id)){
			 $user_add=Checkout::where('user_id', $user_id)->get();
		 	 return view('pages.checkout_update', compact('cartlist', 'user_add'));
		 }
	 else{
		 return view('pages.checkout', compact('cartlist'));
	 }
	}
	
    public function store(Request $request){
		$this->validate($request, [
			'email' => 'required',
			'name' => 'required|max:20',
			'phone' => 'required|max:11',
			'address' => 'required|max:255',
			'zip' => 'required',
			'city' => 'required',
			'state' => 'required'
		]);
		
		$address=new Checkout;
		$address->email = $request->email;
		$address->name = $request->name;
		$address->phone = $request->phone;
		$address->address = $request->address;
		$address->zip = $request->zip;
		$address->city = $request->city;
		$address->state = $request->state;
		$address->user_id = auth()->user()->id;
		$address->payment_method = $request->bank;
		$address->save();
		
	    Order::createOrder();
		
		Session::flash('success', 'Address Added Successfully!');
		
		//Redirected to another page
		return redirect()->route('checkout.index');
	}
	
	public function update(Request $request, $id){
		$address=Checkout::find($id);
		$address->email = $request->email;
		$address->name = $request->name;
		$address->phone = $request->phone;
		$address->address = $request->address;
		$address->zip = $request->zip;
		$address->city = $request->city;
		$address->state = $request->state;
		$address->user_id = auth()->user()->id;
		$address->payment_method = $request->bank;
		$address->save();
		
		Order::createOrder();
		Session::flash('success', 'Updated Successfully!');
		return redirect()->route('checkout.index');
	}
	
	public function addWishlist($id){
		$wishlist=new WishList;
		$wishlist->pro_id=$id;
		$wishlist->user_id= Auth::user()->id;
		
		$result = DB::table('wish_lists')
		->where('user_id', '=', Auth::user()->id)
		->where('pro_id', '=', $id)
		->exists();
			if($result){
			  $product=Product::find($id);
		    Session::flash('success', 'Product Already Added To WishList!');
		    return redirect()->route('viewWishlist');
			
		}
		else{
			//echo $wishes->user_id."<br>". $wishes->pro_id ." <br>". $wishlist->pro_id;
			$wishlist->save();
			$product=Product::find($id);
			Session::flash('success', 'Product Added To WishList!');
			return redirect()->route('viewWishlist');
		}
		//$wish=DB::table('wish_lists')->where('pro_id', $id and 'user_id', $user_id)->get();
	}
	
	public function viewWishlist(){
		$user_id=Auth::user()->id;
		$wish=DB::table('wish_lists')->leftJoin('products', 'products.id', '=', 'wish_lists.pro_id')->where('user_id', $user_id)->paginate(6);
		return view('pages.viewWishList', compact('wish'));
	}
	
	public function deleteWishlist($id){
		$delwish=DB::table('wish_lists')
		->where('user_id', '=', Auth::user()->id)
		->where('pro_id', '=', $id);
		$delwish->delete();
    Session::flash('success', 'WishList Deleted!');
		return redirect()->route('viewWishlist');
	}
}
