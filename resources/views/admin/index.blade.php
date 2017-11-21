@extends("admin.base")
@section('title', '| Home')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-2">
			@include('admin.sidebar')
		</div>
		<div class="nav navbar-right">
			<a href="" data-toggle="modal" data-target="#new_subject" title=" Add New Product"> <i class="fa fa-plus hoverable" style="font-size: 20px; margin-right: 40px; margin-bottom: 10px;"></i></a>
		</div>
		<div class="col-md-10">
			<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>No.</th>
						<th>Category</th>
						<th>Brand</th>

						<th>Name</th>
						<th>Price</th>
						<th>Description</th>

						<th>Size</th>
						<th>Color</th>
						<th>Image</th>
						<th>Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>No.</th>
						<th>Category</th>
						<th>Brand</th>

						<th>Name</th>
						<th>Price</th>
						<th>Description</th>

						<th>Size</th>
						<th>Color</th>
						<th>Image</th>
						<th>Action</th>
					</tr>
				</tfoot>

				<tbody>
					@foreach($products as $product)
					<tr>
						<td>{{$product->id}}</td>
						<td>{{$product->category_id}}</td>
						<td>{{$product->brand_id}}</td>
						<td>{{$product->pro_name}}</td>
						<td>{{$product->pro_price}}</td>
						<td>{{$product->pro_info}}</td>
						<td>{{$product->size}}</td>
						<td>{{$product->color}}</td>
						<td style="width: 15%;"><img src="{{ asset('images/'.$product->pro_img) }}" style="width: 100%; height: 80px;"></td>
						<td><a href="{{route('product.edit', $product->id)}}"  class="btn btn-xs btn-primary" ><span class="fa fa-pencil" style="font-size: 20px;"></span></a>
						{!! Form::open(['route' => ['product.destroy',$product->id], 'method' => 'DELETE']) !!}
						<button type="submit" class="btn btn-xs btn-danger" style="margin-top: -47px; margin-left: 35px;"><span class="fa fa-trash " style="font-size: 20px;"></span></button>
						{!! Form::close() !!}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- /.modal new product  -->
<div class="modal fade" id="new_subject" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header" style="height: 50px;">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 style="line-height: 0px;">Add Product</h4>
			</div>
			<div class="modal-body" style="height: 570px; overflow-y: scroll !important;">
				<div class="row">
					{!! Form::open(['route' => 'product.store', 'method' => 'POST', 'files' => true ]) !!}
					<div class="col-md-6">
						{{ Form::label('pro_name', 'Product Name') }} {{ Form::text('pro_name', null, ['class' => 'form-control', 'required' =>'']) }}
					</div>
					<div class="col-md-6">
						{{ Form::label('pro_code', 'Product Code') }} {{ Form::text('pro_code', null, ['class' => 'form-control', 'required' =>'']) }}
					</div>
					<div class="col-md-6">
						{{ Form::label('category','Category') }}
						<select class="form-control" name='category' required>
							@foreach($cat as $category)
							<option value="{{$category->category_id}}">{{$category->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-6">
						{{ Form::label('brand','Brand') }}
						<select class="form-control" name='brand' required>
							@foreach($brand as $brands)
							<option value="{{$brands->brand_id}}">{{$brands->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-6">
						{{ Form::label('pro_price', 'Price') }} {{ Form::text('pro_price', null, ['class' => 'form-control', 'required' =>'']) }}
					</div>
					<div class="col-md-6">
						{{ Form::label('pro_img', 'Image') }} {{ Form::file('pro_img', null, ['class' => 'form-control', 'required' =>'']) }}
					</div>
					<div class="col-md-12" style="margin-top: 10px; margin-bottom: 10px;">
						<a href="#demo" data-toggle="collapse" style="font-size: 14px; text-decoration: none; font-weight: bold;">Add Properties</a>
						<div id="demo" class="collapse">
							<div class="col-md-6">
								<select class="form-control" name='size' required>
								  <option>Select Size</option>
									<option value="S">S</option>
									<option value="XS">XS</option>
									<option value="L">L</option>
									<option value="XL">XL</option>
									<option value="XL">XXL</option>
								</select>
							</div>
							<div class="col-md-6">
								<select class="form-control" name='color' required>
							    <option>Select Color</option>
								  <option value="White">White</option>
									<option value="Black">Black</option>
									<option value="Red">Red</option>
									<option value="Green">Green</option>
									<option value="Yellow">Yellow</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						{{ Form::label('pro_info', 'Product Details') }} {{ Form::textarea('pro_info',null, ['class' => 'form-control', 'required' =>'']) }}<br>
					</div>
					<div class="col-md-12">
						{{ Form::submit('Add', ['class' => 'btn btn-success btn-block']) }}
					</div>
					 {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection