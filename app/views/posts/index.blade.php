@extends('layouts.default')
@section('content')
<div class="question md-h lg-h">
	<div class="row row-md-h row-lg-h">
		<div class="col-xs-12 col-md-4 col-lg-4 col-md-h col-lg-h top-posts left-side">

			@include('posts.elements.leftside.header')

			@include('posts.elements.leftside.top')

		</div>
		<div class="col-xs-12 col-md-4 col-lg-4 col-md-h col-lg-h col-t">

			@include('posts.elements.question.question')

			<div class="submit text-center m-t-xxlg m-b-xxlg">
				<a href="{{ URL::route('post-options') }}" class="btn btn-xlg btn-primary">Submit</a>
				@if (!Auth::check())
					<p class="m-t-xs">Must be <strong>Logged In</strong><br> to submit a comment</p>
				@endif
				<hr>

				<div class="time-remaining-lg">
					<h4>Time Remaining :</h4>
                    <div class="centered">
                        <div class="time">
								<div class="digits">
									<script>
									// set the date we're counting down to
									var target_date = new Date('{{ $remaining_time['due_date_short_month'] }}, {{ $remaining_time['due_date_day'] }}, {{ $remaining_time['due_date_year'] }}').getTime();
							    
									// variables for time units
									var days, hours, minutes, seconds;
							    
									// get tag element
									var countdown = document.getElementById('countdown');
							    
									// update the tag with id "countdown" every 1 second
									setInterval(function () {
							    
								    	// find the amount of "seconds" between now and target
								    	var current_date = new Date().getTime();
							        	var seconds_left = (target_date - current_date) / 1000;
							    
							      	 	// do some time calculations
							       		days = parseInt(seconds_left / 86400);
							       		seconds_left = seconds_left % 86400;
							        
									    hours = parseInt(seconds_left / 3600);
								        seconds_left = seconds_left % 3600;
							        
							       		minutes = parseInt(seconds_left / 60);
							       		seconds = parseInt(seconds_left % 60);

								       	$('#countdown').html('<span id="days">' + pad(days,2) +  '</span><span>:</span> <span id="hrs">' + pad(hours,2) + '</span><span>:</span> <span id="min">' + pad(minutes,2) + '</span><span>:</span> <span id="sec">' + pad(seconds,2) + '</span>');
							    
								}, 1000);				   
								</script>   
								<div id="countdown"></div>
								<div class="time-lbl">
									<span>Days</span>
									<span></span>
									<span>Hours</span>
									<span></span>
									<span>Minutes</span>
									<span></span>
									<span>Seconds</span>					
								</div>				 				
							</div>
                        </div>
                    </div>
					<div class="date">{{ $remaining_time['due_date'] }}</div>
				</div>

				@if($leading)
				<hr>
				<p class="leading">
					<strong>Leading Bant :</strong><br>
					<a href="{{ URL::route('profile', [$leading->user->username]) }}">
						{{ $leading->user->username }} = {{ ($leading->points > 1) ? $leading->points.' Points' : $leading->points.' Point' }}
					</a>
				</p>
				@endif

			</div>
		</div>
		<div class="col-xs-12 col-md-4 col-lg-4 col-md-h col-lg-h top-posts right-side">

			@include('posts.elements.rightside.header')

			@include('posts.elements.rightside.top')

		</div>
	</div>
</div>

@stop