@extends('layouts.default')
@section('content')

<div class="row">
	<div class="col-lg-6 col-lg-offset-3">

		<div class="panel panel-default password-reset">

			<div class="panel-heading">
				<h3 class="panel-title">Reset Password</h3>
			</div>

			<div class="panel-body">

				{{ Form::open(['route' => 'password.request']) }}

				<div class="form-group">
					{{ Form::label('email', 'Email :') }}
					{{ $errors->first('email', '<span class="text-danger">:message</span>') }}
					{{ Form::email('email', Input::old('email'), ['class' => 'form-control', 'placeholder' => 'Enter your email address']) }}
				</div>

				<div class="form-group text-center">
					<button type="submit" class="btn btn-lg btn-primary">Submit</button>
				</div>

				{{ Form::close() }}

			</div>
		</div>

	</div>
</div>

@stop