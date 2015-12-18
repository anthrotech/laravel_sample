@extends('layouts.default')
@section('content')

<div class="contact content-wrapper">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
			<h2>Contact Us</h2>
		</div>
		<div class="col-md-12 col-lg-12">
			<div class="content">

				<p>We are currently in beta development and want to hear what you think!</p><br>

				{{ Form::open(['url' => 'contact', 'class' => 'form']) }}

				<div class="row">
					<div class="col-sm-6 col-lg-6">
						<div class="form-group">
							{{ Form::label('full_name', 'Full Name :') }}
							{{ $errors->first('full_name', '<span class="text-danger">:message</span>') }}
							{{ Form::text('full_name', Input::old('full_name'), ['class' => 'form-control', 'placeholder' => 'ex: Jhon Doe']) }}
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

				<div class="form-group">
					{{ Form::label('content', 'Message :') }}
					{{ $errors->first('content', '<span class="text-danger">:message</span>') }}
					{{ Form::textarea('content', Input::old('content'), ['class' => 'form-control', 'rows' => 7, 'placeholder' => 'Your message here...']) }}
				</div>

				<div class="form-group text-center">
					<button type="submit" class="btn btn-xlg btn-primary">Send</button>
				</div>

				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>

@stop