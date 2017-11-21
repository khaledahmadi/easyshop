@extends('profile.sidebar')
@section('title', '|My Address')


@section('profile_section')
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				@if(Session::has('success'))
					<div class="alert alert-success">
					  <strong>Success!</strong> {{Session::get('success')}}
					</div>
				@endif
				<h4>My Address</h4>
				 <div class="progress">
					  <div class="progress-bar" role="progressbar" aria-valuenow="50"
					  aria-valuemin="0" aria-valuemax="100"></div>
				</div> 
				@foreach($user_add as $add)
				{!! Form::Model($user_add, ['route' => ['address.edit', $add->id], 'method' => 'PUT']) !!}
					
					{{ Form::label('address', 'Address') }}
				    {{ Form::text('address', $add->address,['class' => 'form-control']) }}
				    {{ Form::label('state', 'State') }}
				    {{ Form::select('state',[$add->state,'Nilai' => 'Nilai', 'Bander Tasik Selatan' => 'Bander Tasik Selatan', 'Johor' => 'Johor', 'Penang' => 'Penang', 'Sabah' =>'Sabah'], ['class' => 'form-control']) }}
				    {{ Form::label('city', 'City') }}
				    {{ Form::text('city', $add->city,['class' => 'form-control']) }}
				    {{ Form::label('zip', 'Post Code') }}
				    {{ Form::text('zip', $add->zip,['class' => 'form-control']) }}
				    
				    {{ Form::submit('Edit My Address', ['class' => 'btn btn-primary edit'])}}
				    
				{!! Form::close() !!}
				@endforeach
			</div>
		</div>
	</div>
@endsection