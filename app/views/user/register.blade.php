@extends('layouts.default')
@section('content')

<div class="content-wrapper">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
			<h2>Sign Up</h2>
		</div>
		<div class="col-md-12 col-lg-12">
			<div class="content">

				{{ Form::open(['route' => 'register', 'files' => true, 'class' => 'form']) }}

				<div class="row">
					<div class="col-sm-6 col-lg-6">
						<div class="form-group">
							{{ Form::label('first_name', 'First Name :') }}
							{{ $errors->first('first_name', '<span class="text-danger">:message</span>') }}
							{{ Form::text('first_name', Input::old('first_name'), ['class' => 'form-control']) }}
						</div>
					</div>
					<div class="col-sm-6 col-lg-6">
						<div class="form-group">
							{{ Form::label('last_name', 'Last Name :') }}
							{{ $errors->first('last_name', '<span class="text-danger">:message</span>') }}
							{{ Form::text('last_name', Input::old('last_name'), ['class' => 'form-control']) }}
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6 col-lg-6">
						<div class="form-group">
							{{ Form::label('username', 'Username :') }}
							{{ $errors->first('username', '<span class="text-danger">:message</span>') }}
							{{ Form::text('username', Input::old('username'), ['class' => 'form-control']) }}
						</div>
					</div>
					<div class="col-sm-6 col-lg-6">
						<div class="form-group">
							{{ Form::label('email', 'Email :') }}
							{{ $errors->first('email', '<span class="text-danger">:message</span>') }}
							{{ Form::email('email', Input::old('email'), ['class' => 'form-control', 'placeholder' => 'example@domain.com']) }}
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6 col-lg-6">
						<div class="form-group">
							{{ Form::label('password', 'Password :') }}
							{{ $errors->first('password', '<span class="text-danger">:message</span>') }}
							{{ Form::password('password', ['class' => 'form-control']) }}
						</div>
					</div>
					<div class="col-sm-6 col-lg-6">
						<div class="form-group">
							{{ Form::label('password_confirmation', 'Password Confirmation :') }}
							{{ $errors->first('password_confirmation', '<span class="text-danger">:message</span>') }}
							{{ Form::password('password_confirmation', ['class' => 'form-control']) }}
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							{{ Form::label('picture', 'Picture (optional) :') }}
							{{ $errors->first('picture', '<span class="text-danger">:message</span>') }}
							{{ Form::file('picture', ['class' => 'form-control']) }}
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<p>By clicking Sign Up, you agree to BESTBANT's User Agreement, Privacy Policy and Cookie Policy.</p>
					</div>
				</div>

				<div class="form-group text-center">
					<button type="submit" class="btn btn-xlg btn-primary">Sign Up</button>
				</div>

				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>

@stop