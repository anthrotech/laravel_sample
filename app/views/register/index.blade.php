@extends('layouts.default')
@section('content')

<div class="content-wrapper">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
			<h2>Sign Up</h2>
		</div>
		<div class="col-md-12 col-lg-12">
			<div class="content">

				{{ Form::open(array('url' => 'register', 'class' => 'form')) }}

				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							{{ Form::label('name', 'Full Name :') }}
							{{ $errors->first('name', '<span class="text-danger">:message</span>') }}
							{{ Form::text('name', Input::old('name'), ['class' => 'form-control', 'placeholder' => 'ex: Jhon Doe']) }}
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							{{ Form::label('email', 'Email :') }}
							{{ $errors->first('email', '<span class="text-danger">:message</span>') }}
							{{ Form::text('email', Input::old('email'), ['class' => 'form-control', 'placeholder' => 'example@domain.com']) }}
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							{{ Form::label('username', 'Username :') }}
							{{ $errors->first('username', '<span class="text-danger">:message</span>') }}
							{{ Form::text('username', Input::old('username'), ['class' => 'form-control', 'placeholder' => 'ex: Jhondoe']) }}
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							{{ Form::label('picture', 'Picture (optional) :') }}
							{{ $errors->first('picture', '<span class="text-danger">:message</span>') }}
							{{ Form::file('picture', ['class' => 'form-control']) }}
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							{{ Form::label('password', 'Password :') }}
							{{ $errors->first('password', '<span class="text-danger">:message</span>') }}
							{{ Form::password('password', ['class' => 'form-control']) }}
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							{{ Form::label('confirmpass', 'Password Confirmation :') }}
							{{ $errors->first('confirmpass', '<span class="text-danger">:message</span>') }}
							{{ Form::password('confirmpass', ['class' => 'form-control']) }}
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							{{ Form::label('location', 'Location :') }}
							{{ $errors->first('location', '<span class="text-danger">:message</span>') }}
							{{ Form::text('location', Input::old('location'), ['class' => 'form-control']) }}
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							{{ Form::label('interests', 'Interests :') }}
							{{ $errors->first('interests', '<span class="text-danger">:message</span>') }}
							{{ Form::text('interests', Input::old('interests'), ['class' => 'form-control', 'placeholder' => 'List of interests']) }}
						</div>
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