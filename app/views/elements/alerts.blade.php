@if (Alert::has('default'))
	<div class="alert alert-default" role="alert">{{ Alert::get('default') }}</div>
@endif



@if (Alert::has('error'))
	<div class="alert alert-error" role="alert">{{ Alert::get('error') }}</div>
@endif


@if (Alert::has('success'))
	<div class="alert alert-success" role="alert">{{ Alert::get('success') }}</div>
@endif


@if(Session::has('success'))
	<div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
@endif

@if(Session::has('failure'))
	<div class="alert alert-error" role="alert">{{ Session::get('failure') }}</div>
@endif



@if (Alert::has('info'))
	<div class="alert alert-info" role="alert">{{ Alert::get('info') }}</div>
@endif



@if (Alert::has('warning'))
	<div class="alert alert-warning" role="alert">{{ Alert::get('warning') }}</div>
@endif