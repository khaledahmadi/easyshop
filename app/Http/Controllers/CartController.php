<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart; // for cart lib
use App\Product;


class CartController extends Controller
{
    //
	
	public function index()
    {
		$cartItem=Cart::content();
        return view('cart.index', compact('cartItem'));
    }

	 public function addItem(Request $request, $id){
        $products = Product::find($id); // get prodcut by id
        if(isset($request->newPrice))
        {
          $price = $request->newPrice; // if size select
        }
        else{
          $price = $products->pro_price; // default price
        }
        Cart::add($id,$products->pro_name,1,$price,['img' => $products->pro_img,'stock' => $products->stock]);
		 return back();
         //return redirect()->route('cart.index');
    }
	
	public function destroy($id){
		Cart::remove($id);
		return back();
	}
	
	 public function update(Request $request,$id)
    {
           $qty = $request->qty;
           $proId = $request->proId;
           $rowId = $request->rowId;
           Cart::update($rowId,$qty); // for update
           $cartItem = Cart::content(); // display all new data of cart
		   return view('cart.upCart', compact('cartItem'))->with('status', 'cart updated');
		//echo $cartItems;
}
	
}