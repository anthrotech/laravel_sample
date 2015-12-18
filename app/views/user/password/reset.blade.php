@extends('layouts.default')
@section('content')

<div class="row">
	<div class="col-lg-6 col-lg-offset-3">

		<div class="panel panel-default password-reset">

			<div class="panel-heading">
				<h3 class="panel-title">Change your password</h3>
			</div>

			<div class="panel-body">

				{{ Form::open(['route' => 'password.reset']) }}

				{{ Form::hidden('token', $token) }}

				<div class="form-group">
					{{ Form::label('email', 'Email :') }}
					{{ $errors->first('email', '<span class="text-danger">:message</span>') }}
					{{ Form::email('email', Input::old('email'), ['class' => 'form-control', 'placeholder' => 'Enter your email address']) }}
				</div>

				<div class="form-group">
					{{ Form::label('password', 'Password :') }}
					{{ $errors->first('password', '<span class="text-danger">:message</span>') }}
					{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Enter your new password']) }}
				</div>

				<div class="form-group">
					{{ Form::label('password_confirmation', 'Password Confirmation :') }}
					{{ $errors->first('password_confirmation', '<span class="text-danger">:message</span>') }}
					{{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm your new password']) }}
				</div>

				<div class="form-group text-center">
					<button type="submit" class="btn btn-lg btn-primary">Change Password</button>
				</div>

				{{ Form::close() }}

			</div>
		</div>

	</div>
</div>

@stop