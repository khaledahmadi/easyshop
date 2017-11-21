@extends('pages.base')
@section('title', '|Product')


@section('content')

<section id="advertisement">
	<img src="images/shop/advertisement.jpg" alt="" />
</section>
	
	<section>
		<div class="row">
				<div class="col-sm-3">
					<div class="container">
						@include('pages.sidebar')
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
	
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">
						@if(@isset($msg))
					  		{{$msg}}
					  	@else
						  Features Items
						@endif
						  </h2>
						@if($product->isEmpty())
						  Sorry, Product Not Found
						@else
						@foreach($product as $products)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="{{ asset('images/'.$products->pro_img) }}">
										<h2>{{ $products->pro_price}}</h2>
										<p>{{$products->pro_name}}</p>
										<a href="{{route('pages.product-details',$products->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Details</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>{{ $products->pro_price}}</h2>
											<p>{{$products->pro_name}}</p>
											<a href="{{route('pages.product-details',$products->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Details</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="{{route('addWishlist',$products->id)}}"><i class="fa fa-heart"></i> Add to wishlist</a></li>
										<li><a href="{{route('cart.addItem',$products->id)}}"><i class="fa fa-shopping-cart"></i>Add to cart</a></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
						@endif
						<ul class="pagination">
							{!! $product->links() !!}
						</ul>
					</div><!--features_items-->
				</div>
			</div>
	
	</section>
	
@endsection