@extends('pages.base')
@section('title', '| Login')


@section('content')

	<section id="form"><!--form-->
			<div class="row">
				<div class="col-sm-5">
					<div class="login-form"><!--login form-->
					<div class="panel panel-primary panel_color">
						<div class="panel-heading">
							<b>Login to your account</b>
            </div>
            <div class="panel-body">
       				<form class="form-horizontal" method="POST" action="{{ route('login') }}" >
               {{ csrf_field() }}      
									<input type="email" placeholder="Email Address" class="{{ $errors->has('email') ? ' has-error' : '' }}" name="email" value="{{ old('email') }}" required autofocus/>
									@if ($errors->has('email'))
                       <span class="help-block">
                           <strong>{{ $errors->first('email') }}</strong>
                       </span>
                  @endif
									<input id="password" type="password" class="{{ $errors->has('password') ? ' has-error' : '' }}" name="password" required />
										 @if ($errors->has('password'))
                         <span class="help-block">
                             <strong>{{ $errors->first('password') }}</strong>
                         </span>
                     @endif
									<span>
										<div class="row">
											<div class="col-md-6">
												<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Keep me signed in
											</div>
											<div class="col-md-6">
												<a class="btn btn-link forget" href="{{ route('password.request') }}">Forgot Your Password</a>
											</div>
										</div> 
									</span>
									<button type="submit" class="btn btn-default">Login</button>
              </form>
						</div>
						</div>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-6">
					<div class="signup-form"><!--sign up form-->
					<div class="panel panel-primary panel_color">
						<div class="panel-heading">
							<b>New User Signup!</b>
						</div>
						<div class="panel-body">
							<form class="form-horizontal" method="POST" action="{{ route('register') }}">
                 {{ csrf_field() }}
								<input id="name" type="text" class="{{ $errors->has('name') ? ' has-error' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Name">

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                <input id="email" type="email" class="{{ $errors->has('email') ? ' has-error' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email Address">

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <input id="password" type="password" class="{{ $errors->has('password') ? ' has-error' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
							<button type="submit" class="btn btn-default">Register</button>
						</form>
						</div>
						</div>
					</div><!--/sign up form-->
				</div>
			</div>
	</section><!--/form-->

@endsection