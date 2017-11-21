@extends( "admin.base" )
@section( 'title', '| Update Product' )

@section( 'content' )

<div class="container">
	<div class="row">
		<div class="col-md-2">
			@include('admin.sidebar')
		</div>
		<div class="col-md-10">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<p><b>Edit Product</b></p>
				</div>
				<div class="panel-body">
					<div class="row">
						{!! Form::Model($product_edit, ['route' => ['product.update', $product_edit->id], 'method' => 'PUT', 'files' => 'true']) !!}

						<div class="col-md-6">
							{{ Form::label('pro_name', 'Product Name') }} {{ Form::text('pro_name', $product_edit->pro_name, ['class' => 'form-control', 'required' =>'']) }}
						</div>
						<div class="col-md-6">
							{{ Form::label('pro_code', 'Product Code') }} {{ Form::text('pro_code', $product_edit->pro_code, ['class' => 'form-control', 'required' =>'']) }}
						</div>
						<div class="col-md-6">
							{{ Form::label('category_id','Category') }} 
							{{ Form::select('category_id', $cats, null, ['class' => 'form-control']) }}
    					</div>
    					<div class="col-md-6">
							{{ Form::label('brand_id','Brand') }} 
							{{ Form::select('brand_id', $brands, null, ['class' => 'form-control']) }}
    					</div>
						<div class="col-md-6">
							{{ Form::label('pro_price', 'Price') }} {{ Form::text('pro_price', $product_edit->pro_price, ['class' => 'form-control', 'required' =>'']) }}
						</div>
						<div class="col-md-6">
							{{ Form::label('stock', 'Stock') }} {{ Form::text('stock', null, ['class' => 'form-control']) }}
						</div>
						
						<div class="col-md-12" style="margin-top: 10px; margin-bottom: 10px;">
						<a href="#demo" data-toggle="collapse" style="font-size: 14px; text-decoration: none; font-weight: bold;">Add Properties</a>
						<div id="demo" class="collapse">
							<div class="col-md-6">
								<select class="form-control" name='size' required>
								  <option>{{$product_edit->size}}</option>
									<option value="S">S</option>
									<option value="XS">XS</option>
									<option value="L">L</option>
									<option value="XL">XL</option>
									<option value="XXL">XXL</option>
								</select>
							</div>
							<div class="col-md-6">
								<select class="form-control" name='color' required>
							    <option>{{$product_edit->color}}</option>
								  <option value="White">White</option>
									<option value="Black">Black</option>
									<option value="Red">Red</option>
									<option value="Green">Green</option>
									<option value="Yellow">Yellow</option>
								</select>
							</div>
						</div>
					</div>
						
						<div class="col-md-6">
							{{ Form::label('pro_info', 'Product Details') }} {{ Form::textarea('pro_info',$product_edit->pro_info, ['class' => 'form-control', 'required' =>'']) }}<br>
						</div>
						<div class="col-md-6">
							<label for="pro_img" class="product_img">
								<img src="{{ asset('images/'.$product_edit->pro_img) }}">
								<input type="file" id="pro_img" name="pro_img" style="display: none">
							</label>
						</div>
						<div class="col-md-12">
							{{ Form::submit('Update', ['class' => 'btn btn-success']) }}
						</div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection