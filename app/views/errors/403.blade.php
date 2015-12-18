@extends('layouts.default')
@section('content')

<div class="panel panel-default error-404">
  <div class="panel-body">
  <h3 class="text-center">Access Denied</span></h3>
    <div class="row">
    	<div class="col-md-6 col-lg-5">
    		<div class="content">
    			<p>You do not have permission to access this page.</p>
    		</div>
    	</div>
    	<div class="col-md-6 col-lg-6 col-lg-offset-1 text-center">
    		<img src="{{ asset('img/404.png') }}" alt="">
    	</div>
    </div>
  </div>
</div>

@stop