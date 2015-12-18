@extends('layouts.default')
@section('content')

<div class="panel panel-default error-404">
  <div class="panel-body">
  <h3 class="text-center">Sorry, this page isn't available <br> <span>Application is not properly configured.</span></h3>
    <div class="row">
    	<div class="col-md-6 col-lg-5">
    		<div class="content">
    			<p>It seems the page you were trying to reach doesn't exist anymore, or maybe it has just moved. We think the best thing to do is to start again from the <a href="{{{ URL::route('home') }}}">home page</a>.</p>
	    		<p>Please contact us at 1-803-254-3652 or email us at <a href="">contact@domain.com</a> if you cannot find what you are looking for and we will be happy to assist you.</p>
	    		<p>Thank you very much.</p>
    		</div>
    	</div>
    	<div class="col-md-6 col-lg-6 col-lg-offset-1 text-center">
    		<img src="{{ asset('img/404.png') }}" alt="">
    	</div>
    </div>
  </div>
</div>

@stop