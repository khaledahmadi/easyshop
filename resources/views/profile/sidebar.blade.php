@extends('pages.base')
@section('title', '|Cart')


@section('content')

<section id="sidebar">
		<div class="container sidebar">
			<div class="row">
				<div class="col-md-3">
					<div class="profile_img">
						<img src="{{ asset('images/user.png') }}" class="img-circle">
						<p><b>{{Auth()->user()->name}}</b></p>
					</div>
					<div class="profile_btn">
						<span class="{{ Request::is('profile') ? 'active' : "" }}"><a href="{{route('profile.index')}}" class="btn"><span class="i1">My Profile<span class="sr-only">(current)</span></span></a></span>
						<span class="{{ Request::is('address') ? 'active' : "" }}"><a href="{{route('profile.myaddress')}}" class="btn"><span class="i2">My Address</span></a></span>
						<span class="{{ Request::is('myorder') ? 'active' : "" }}"><a href="{{route('profile.myorder')}}" class="btn"><span class="i3">My Order</span></a></span>
						<span class="{{ Request::is('password') ? 'active' : "" }}"><a href="{{route('profile.password')}}" class="btn"><span class="i4">Change Password</span></a></span>
					</div>
				</div>
				<div class="col-md-9">
					@yield('profile_section')
				</div>
			</div>
		</div>
	</section> <!--/#sidebar-->


@endsection