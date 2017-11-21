<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Recommend;
use Illuminate\Support\FacadeS\DB;
use Gloudemans\Shoppingcart\Facades\Cart; // for cart lib
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	
   /* public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			return view('pages.index');
		}
	
	public function cart(){
		return view('pages.cart');
	}
	
	public function checkout(){
		return view('pages.checkout');
	}
	public function shop(Request $request){
		if($request->ajax() && isset($request->max)){
			$max = $request->max;
			$min = $request->min;
			$product=DB::table('products')->where('pro_price','>=',$max)->where('pro_price','<=', $min)->orderBy('pro_price','desc')->paginate(6);
			//dd($product);
			 //response()->json($product);
			return view('pages.product_range', compact('product'));
		}
		 else if(isset($request->fetchCat)){
			$fetchCat = $request->fetchCat;
			$product=DB::table('products')->whereIn('category_id', explode( ',', $fetchCat))->paginate(6);
			//dd($product);
			 //response()->json($product);
			return view('pages.product_range', compact('product'));
		}
		else{
			$product=Product::orderBy('created_at','desc')->paginate(6);
			return view('pages.shop', compact('product'));
		}
	}
	
	public function brandProduct(Request $request){
		$cat_name= $request->name;
		$product=DB::table('products')->leftJoin('brands', 'brands.brand_id', '=', 'products.brand_id')->where('brands.name', '=', $cat_name)->paginate(6);
		return view('pages.product_category', compact('product'));
		
		}
	public function CatProduct(Request $request){
		$cat_name= $request->name;
		$product=DB::table('products')->leftJoin('cats', 'cats.category_id', '=', 'products.category_id')->where('cats.name', '=', $cat_name)->paginate(6);
		return view('pages.product_category', compact('product'));
		}
	
	
	public function product_detail(){
		return view('pages.product-detail');
	}
	
	public function product_details($id){
		//insert data for recommend table
		if(Auth::user()){
		$recommends=New Recommend;
		$recommends->pro_id = $id;
		$recommends->user_id = Auth::user()->id;
		$recommends->save();
		}
		//revommended based on view
		$recommend=DB::table('recommends')->leftJoin('products', 'products.id', '=', 'recommends.pro_id')
			->select('pro_id','pro_name','pro_price', 'pro_img',DB::raw('count(*) as total'))
			->groupBy('pro_id','pro_name','pro_price', 'pro_img')
			->orderBy('total', 'DESC')
			->take(3)->get();
		
		//recommended based on user
		$recommend_user=DB::table('recommends')->leftJoin('products', 'products.id', '=', 'recommends.pro_id')
			->inRandomOrder()
			->take(3)->get();
		
		$product=Product::find($id);
		//$cartItem=Cart::content();
		return view('pages.product-details', compact('product','recommend', 'recommend_user'));
	}
	
	public function blog(){
		return view('pages.blog');
	}
	
	public function blog_single(){
		return view('pages.blog-single');
	}
	
	public function contact(){
		return view('pages.contact');
	}
	
	public function search(Request $request){
		$search=$request->search1;
		$msg='Result: '.$search;
		if($search == ''){
			return view('pages.index');
		}
		else{
		$product=Product::where('pro_name','like', '%'.$search.'%')->paginate(6);
		return view('pages.shop', compact('product', 'msg'));
	}
	}
}
