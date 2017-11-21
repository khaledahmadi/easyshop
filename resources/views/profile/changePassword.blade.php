@extends('profile.sidebar')
@section('title', '|Change Password')


@section('profile_section')
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				@if(Session::has('success'))
					<div class="alert alert-success">
					  <strong>Success!</strong> {{Session::get('success')}}
					</div>
				@endif
				 <h4>Change Password</h4>
				 <div class="progress">
					  <div class="progress-bar" role="progressbar" aria-valuenow="70"
					  aria-valuemin="0" aria-valuemax="100"></div>
				</div>
				@foreach($user_add as $post)
				{!! Form::Model($user_add, ['route' => ['password.edit', $post->id], 'method' => 'PUT']) !!}
					
					{{ Form::label('oldpass', 'Old Password') }}
				    {{ Form::password('oldpass',['class' => 'form-control']) }}
				    {{ Form::label('newpass', 'New Password') }}
				    {{ Form::password('newpass',['class' => 'form-control']) }}
				    
				    {{ Form::submit('Change Password', ['class' => 'btn btn-primary edit'])}}
				   
				{!! Form::close() !!}
				 @endforeach
			</div>
		</div>
	</div>
@endsection