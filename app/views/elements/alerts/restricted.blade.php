{{-- CHECK FOR GUESTS ALERT --}}
@if (Session::has('flash_login'))

<div class="alert alert-warning" role="alert">
	<div class="alert-icon">
		<i class="fa fa-warning"></i>
	</div>
	<div class="alert-body">
		<h4>Unregistered User!</h4>
		<p>Please sign up to access all BestBant Features.</p>
	</div>
</div>

@endif