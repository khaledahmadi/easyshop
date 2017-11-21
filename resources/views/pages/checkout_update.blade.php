<script src="{{ asset('js/jquery.js') }}"></script>
@extends('pages.base')
@section('title', '|Checkout Update')


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
				<div class="panel-heading">
					<b>Your shipping address </b></div>
				<div class="panel-body">
				<div class="row">
					<div class="col-md-12 clearfix">
						<div class="bill-to">
						<div class="row">
							<div class="col-md-12 col-md-offset-3">
								<div class="form-one">
								@foreach($user_add as $add)
								{!! Form::Model($user_add, ['route' => ['checkout.update', $add->id], 'method' => 'PUT']) !!}
								
								{{ Form::email('email', $add->email, ['class' => 'form-control', 'required' => '', 'placeholder' => 'Email']) }}
								
								{{ Form::text('name', $add->name, ['class' => 'form-control', 'required' => '', 'placeholder' => 'Full Name']) }}
								
								{{ Form::number('phone', $add->phone, ['class' => 'form-control', 'required' => '', 'placeholder' => 'Phone Number']) }}
								
								{{ Form::text('address', $add->address, ['class' => 'form-control', 'required' => '', 'placeholder' => 'Address']) }}
								
								{{ Form::text('zip', $add->zip, ['class' => 'form-control', 'required' => '', 'placeholder' => 'Zip Code']) }}
								
								{{ Form::text('city', $add->city, ['class' => 'form-control', 'required' => '' , 'placeholder' => 'City']) }}
								
								{{ Form::select('state', [$add->state,'Nilai' => 'Nilai', 'Bander Tasik Selatan' => 'Bander Tasik Selatan', 'Johor' => 'Johor', 'Penang' => 'Penang', 'Sabah' =>'Sabah'], null, ['class' => 'form-control', 'required' => '']) }}<br>
								
								<span>
									<label><input type="radio" name="bank" id="paypalr" value="Paypal" {{ $add->payment_method == 'Paypal' ? 'checked' : '' }}> Paypal</label>
								</span>
								<span>
									<label><input type="radio" name="bank" id="dbtr" value="DBT" {{ $add->payment_method == 'DBT' ? 'checked' : '' }}> Direct Bank Transfer</label>
								</span>
								<span>
									<label><input type="radio" name="bank" id="obr" value="online_bank" {{ $add->payment_method == 'online_bank' ? 'checked' : '' }} > Cash</label>
								</span>
								
								{{ Form::submit('Save', ['class' => 'btn btn-primary ob'])}}
								{{ Form::submit('DBT', ['class' => 'btn btn-primary dbt'])}}
								{!! Form::close() !!}
								@include('pages.paypal')
								
								@endforeach
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
				<div class="panel panel-primary panel_color">
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
	
	<script>

		$('#paypalbtn').hide();
		$('.dbt').hide();
		$('.ob').show();
		
		$('#paypalr').click(function(){
			$('#paypalbtn').show();
			$('.dbt').hide();
		  $('.ob').hide();
		});
		
		$('#dbtr').click(function(){
			$('.dbt').show();
			$('#paypalbtn').hide();
		  $('.ob').hide();
		});
		
		$('#obr').click(function(){
			$('.ob').show();
			$('#paypalbtn').hide();
		  $('.dbt').hide();
		});
</script>
	
	</section> <!--/#cart_items-->

@endsection