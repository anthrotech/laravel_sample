<div class="alert alert-default" role="alert">
	<div class="alert-icon">
		<i class="fa fa-bell"></i>
	</div>
	<div class="alert-body">
		<h4>Account Confirmation!</h4>
		<p>Confirm your email address to submit responses and vote for others. A confirmation message was sent to <strong>{{ Auth::user()->email }}</strong>.</p>
		<a href="" class="btn btn-primary btn-sm">Resend Confirmation</a>&nbsp;
		<a href="">Update Email Address</a>
	</div>
</div>