<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Image;
use Storage;
use App\Product;
use App\Cat;
use App\Brand;

class ProductController extends Controller
{
	
	public function __construct()
    {
        $this->middleware('auth:admin');
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$products=Product::all();
		$cat=Cat::all();
		$brand=Brand::all();
		return view('admin.index',compact('products','cat', 'brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'category' => 'required',
			'brand' => 'required',
			'pro_name' => 'required|min:6',
			'pro_code' => 'required',
			'pro_price'=> 'required|max:10',
			'pro_info' => 'required|max:255',
			'size' => 'required',
			'color' => 'required'
		]);
		
		$products=New Product;
		$products->category_id = $request->category;
		$products->brand_id = $request->brand;
		$products->pro_name = $request->pro_name;
		$products->pro_code = $request->pro_code;
		$products->pro_price = $request->pro_price;
		$products->pro_info = $request->pro_info;
		$products->size = $request->size;
		$products->color = $request->color;
			
		if($request->hasFile('pro_img')){
			$image=$request->file('pro_img');
			$filename=time(). '.' . $image->getClientOriginalExtension();
			$location=public_path('images/'.$filename);
			Image::make($image)->resize(450,300)->save($location);
			
			$products->pro_img=$filename;
		}
		
		$products->save();
		
		Session::flash('success', 'Product Added Successfully!');
		return redirect()->route('admin.dashboard');
		//return redirect()->route('product.show', $products->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$cats=Cat::pluck('name','category_id');
		$brands=Brand::pluck('name','brand_id');
        $product_edit=Product::find($id);
		return view('admin.update-product',compact('product_edit', 'cats', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$product=Product::find($id);
		$product->category_id = $request->category_id;
		$product->brand_id = $request->brand_id;
		$product->pro_name = $request->pro_name;
		$product->pro_code = $request->pro_code;
		$product->pro_price = $request->pro_price;
		$product->pro_info = $request->pro_info;
		$product->size = $request->size;
		$product->color = $request->color;
		
		if($request->hasFile('pro_img')){
			$image=$request->file('pro_img');
			$filename=time(). '.' . $image->getClientOriginalExtension();
			$location=public_path('images/'.$filename);
			Image::make($image)->resize(450,300)->save($location);
			//taking the old image
			$oldimage=$product->pro_img;
			//updating the new image
			$product->pro_img=$filename;
			//deleteing the old image
			Storage::delete($oldimage);
		}
		
		$product->save();
		
		Session::flash('success', 'Product Updated Successfully!');
		return redirect()->route('admin.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
		Storage::delete($product->pro_img);
		$product->delete();

		Session::Flash('success','Successfully Deleted');

		return redirect()->route('product.index');
    }
}
