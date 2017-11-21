@extends('profile.sidebar')
@section('title', '|My Orders')


@section('profile_section')
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<h4>My Orders</h4>
				 <div class="progress">
					  <div class="progress-bar" role="progressbar" aria-valuenow="50"
					  aria-valuemin="0" aria-valuemax="100"></div>
				</div> 
				<table class="table table-responsive">
					<thead>
						<th>Order ID</th>
						<th>Product</th>
						<th>Date</th>
						<th>Amount</th>
						<th>Status</th>
					</thead>
					@foreach($user_order as $order)
					<tbody>
						<td><span class="badge">{{$order->id}}</span></td>
						<td>{{$order->pro_name}}</td>
						<td>{{$order->created_at}}</td>
						<td>${{$order->total}}</td>
						<td><span class="label label-primary">{{$order->status}}</span></td>
					</tbody>
					@endforeach
				</table>
			</div>
		</div>
	</div>
@endsection