@extends('pages.base')
@section('title', '|Checkout')


@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->
		<div class="row">
			<div class="col-md-8">
			@if(Session::has('success'))
			<div class="alert alert-success">
			  <strong>Success!</strong> {{Session::get('success')}}
			</div>
		@endif
				<div class="shopper-informations">
				<div class="panel panel-primary panel_color">
				<div class="panel-heading"><b>Your shipping address </b></div>
				<div class="panel-body">
				<div class="row">
					<div class="col-md-12 clearfix">
						<div class="bill-to">
						<div class="row">
							<div class="col-md-12 col-md-offset-3">
								<div class="form-one">
								{!! Form::open(['route' => 'checkout.store', 'method' => 'POST']) !!}
								
								{{ Form::email('email', null, ['class' => 'form-control', 'required' => '', 'placeholder' => 'Email']) }}
								
								{{ Form::text('name', null, ['class' => 'form-control', 'required' => '', 'placeholder' => 'Full Name']) }}
								
								{{ Form::number('phone', null, ['class' => 'form-control', 'required' => '', 'placeholder' => 'Phone Number']) }}
								
								{{ Form::text('address', null, ['class' => 'form-control', 'required' => '', 'placeholder' => 'Address']) }}
								
								{{ Form::text('zip', null, ['class' => 'form-control', 'required' => '', 'placeholder' => 'Zip Code']) }}
								
								{{ Form::text('city', null, ['class' => 'form-control', 'required' => '' , 'placeholder' => 'City']) }}
								
								{{ Form::select('state', ['State','Nilai' => 'Nilai', 'Bander Tasik Selatan' => 'Bander Tasik Selatan', 'Johor' => 'Johor', 'Penang' => 'Penang', 'Sabah' =>'Sabah'], null, ['class' => 'form-control', 'required' => '']) }}<br>
								
								<span>
									<label><input type="radio" name="bank" checked value="Paypal"> Paypal</label>
								</span>
								<span>
									<label><input type="radio" name="bank" value="DBT"> Direct Bank Transfer</label>
								</span>
								<span>
									<label><input type="radio" name="bank" value="online_bank"> Online Banking</label>
								</span>
								
								{{ Form::submit('Continue', ['class' => 'btn btn-primary'])}}
								{!! Form::close() !!}
							</div>
							</div>
						</div>
						</div>
					</div>					
				</div>
				</div>
				</div>
			</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-primary panel_color" >
					<div class="panel-heading">
						<b>Review & Payment</b>
					</div>
					<div class="panel-body">
						<div class="table-responsive panel panel-info">
							<table class="table table-condensed">
								<thead class="bg-info">
									<tr class="cart_menu">
										<th class="Product" >Product</th>
										<th class="quantity">Quantity</th>
										<th class="price">Price</th>
									</tr>
								</thead>
								<tbody>
								@foreach($cartlist as $cartlists)
									<tr>
										<td class="cart_description">
											<p>{{$cartlists->name}}</p>
											<div style="margin-left: 10px;">
												<b> Standard Delivery</b>
												<p>Thu, 28 Sep - Mon, 2 Oct 2017 </p>
											</div>
										</td>
										<td class="text-center">
											<p>{{$cartlists->qty}}</p>
										</td>
										<td class="text-center">
											<p>${{$cartlists->subtotal}}</p>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
							<div class="panel-footer">
								<b>SubTotal</b><i style="float: right">${{Cart::subtotal()}}</i>
							</div>
							<div class="panel-footer">
								<b>Total</b><i style="float: right">${{Cart::total()}}</i>
							</div>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
	</section> <!--/#cart_items-->

@endsection