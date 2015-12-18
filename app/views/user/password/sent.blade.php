@extends('layouts.default')
@section('content')

<div class="row">
	<div class="col-lg-6 col-lg-offset-3">

		<div class="panel panel-default password-reset">

			<div class="panel-heading">
				<h3 class="panel-title">Password reset confirmation sent!</h3>
			</div>

			<div class="panel-body">

				<p>We’ve sent an email to <strong>{{{ $email }}}</strong> containing a temporary link that will allow you to reset your password for the next {{ Tools::minToHrs(Config::get('auth.reminder.expire', 1440)) }}.</p>

				<p>Please check your spam folder if the email doesn’t appear within a few minutes.</p>

			</div>
		</div>

	</div>
</div>

@stop