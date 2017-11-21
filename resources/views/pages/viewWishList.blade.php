@extends('pages.base')
@section('title', '|Wish List')


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
						  
						@if(Session::has('success'))
							<div class="alert alert-success">
							  <strong>Success!</strong> {{Session::get('success')}}
							</div>
						@endif
						
						@if($wish->isEmpty())
						  You Do not Have Item
						@else
						@foreach($wish as $wishes)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="{{ asset('images/'.$wishes->pro_img) }}">
										<h2>{{ $wishes->pro_price}}</h2>
										<p>{{$wishes->pro_name}}</p>
										<a href="{{route('pages.product-details',$wishes->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Details</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>{{ $wishes->pro_price}}</h2>
											<p>{{$wishes->pro_name}}</p>
											<a href="{{route('pages.product-details',$wishes->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Details</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
						
										<li><a href="{{route('deleteWishlist',$wishes->id)}}"><i class="fa fa-trash"></i>Remove wishlist</a></li>
										<li><a href="{{route('cart.addItem',$wishes->id)}}"><i class="fa fa-shopping-cart"></i>Add to cart</a></li>
										
									</ul>
								</div>
							</div>
						</div>
						@endforeach
						@endif
						<ul class="pagination">
							{!! $wish->links() !!}
						</ul>
					</div><!--features_items-->
				</div>
			</div>
	
	</section>
	
@endsection