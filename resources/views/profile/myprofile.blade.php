@extends('profile.sidebar')
@section('title', '|My Profile')


@section('profile_section')
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				@if(Session::has('success'))
					<div class="alert alert-success">
					  <strong>Success!</strong> {{Session::get('success')}}
					</div>
				@endif
				 <h4>My Profile</h4>
				 <div class="progress">
					  <div class="progress-bar" role="progressbar" aria-valuenow="70"
					  aria-valuemin="0" aria-valuemax="100"></div>
				</div>
				@foreach($user_pro as $post)
				{!! Form::Model($user_pro, ['route' => ['profile.edit', $post->id], 'method' => 'PUT']) !!}
					
					{{ Form::label('name', 'Name') }}
				    {{ Form::text('name', $post->name,['class' => 'form-control']) }}
				    {{ Form::label('email', 'Email') }}
				    {{ Form::text('email', $post->email,['class' => 'form-control']) }}
				    {{ Form::label('phone', 'Phone No') }}
				    {{ Form::text('phone', $post->phone,['class' => 'form-control']) }}
				   
				    
				    {{ Form::submit('Edit My Profile', ['class' => 'btn btn-primary edit'])}}
				   
				{!! Form::close() !!}
				 @endforeach
			</div>
		</div>
	</div>
@endsection