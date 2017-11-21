<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Facades\Cart; // for cart lib
use Auth;
use App\Product;


class Order extends Model
{
	protected $table = 'order';
	protected $fillable = ['total', 'status'];
    public function products(){
		return $this->belongsToMany('App\Product');
	}
	
	public function user(){
		return $this->belongsTo('App\User');
	}
	
    public static function createOrder(){
		
		$user=Auth::user();
		$order=$user->Order()->create(['total' => Cart::total() , 'status' => 'Pending']);
			
		$cartlist=Cart::content();
		foreach($cartlist as $cartlists){
			$order->products()->attach($cartlists->id, ['qty' => $cartlists->qty, 'tax' => Cart::tax(), 'total' => $cartlists->subtotal]);
		}
	}
}
