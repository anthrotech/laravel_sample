@if (Auth::check())

	<div class="account">
		<nav>
			<ul class="list-unstyled">
				<li>
					<a href="{{ URL::route('profile', [LoggedInUser::username()]) }}">
						Edit Profile <span class="pull-right"><i class="fa fa-user"></i></span>
					</a>
				</li>
				<li>
					<a href="{{ URL::route('settings') }}">
						Settings <span class="pull-right"><i class="fa fa-gears"></i></span>
					</a>
				</li>
				<li>
					<a href="{{ URL::route('archive', [LoggedInUser::username()]) }}">
						My Archive <span class="pull-right"><i class="fa fa-folder-open"></i></span>
					</a>
				</li>
				<li>
					<a href="{{ URL::route('logout') }}">
						Logout <span class="pull-right"><i class="fa fa-power-off"></i></span>
					</a>
				</li>
			</ul>
		</nav>

		<div class="media">
			<a href="#" class="pull-left user-nav-dd">
				<img class="media-object" src="{{ asset('img/avatar/'.LoggedInUser::picture()) }}" alt="">
			</a>
			<div class="media-body">
				<h4 class="media-heading">
					<a href="#" class="user-nav-dd">
						{{ LoggedInUser::username() }}
						<span class="pull-right"><i class="fa fa-list"></i></span>
					</a>
				</h4>
			</div>
		</div>
	</div>

@else

	{{ Form::open(['route' => 'login', 'class' => 'form login']) }}

		@if(Alert::has('login_error'))
		<div class="login-error text-center">{{ Alert::get('login_error') }}</div>
		@endif

		<div class="form-group">
			{{ Form::text('email', Input::old('email'), ['class' => 'form-control', 'placeholder' => 'Username or email']) }}
		</div>

		<div class="form-group">
			{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
		</div>

		<div class="form-group">
			<div class="checkbox">
				<label>
					{{ Form::checkbox('remember', null, false) }} Remember me
				</label>
				. &nbsp;<a href="{{ URL::route('password.reminder') }}">Forgot password?</a>
			</div>
		</div>

		<div class="form-group text-center login-btn">
			<button type="submit" class="btn btn-sm btn-primary pull-left">Login</button>
			<span>- OR -</span>
			<a href="{{ URL::route('register') }}" class="btn btn-sm btn-primary pull-right">Sign Up</a>
		</div>

		<hr class="dashed">

		<div class="form-group">
			<p class="text-center">Or Sign in with :</p>
			<a href="{{ URL::route('facebook') }}" class="btn btn-sm btn-facebook pull-left">
				<i class="fa fa-facebook"></i> Facebook
			</a>
			<a href="{{ URL::route('twitter') }}" class="btn btn-sm btn-twitter pull-right">
				<i class="fa fa-twitter"></i> Twitter
			</a>
		</div>

	{{ Form::close() }}

@endif