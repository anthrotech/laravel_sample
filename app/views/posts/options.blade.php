@extends('layouts.default')
@section('content')

<div class="question md-h lg-h">
	<div class="row row-md-h row-lg-h">
		<div class="col-md-4 col-lg-4 col-md-h col-lg-h rand-posts left-side">

			@include('posts.elements.leftside.header')

			@include('posts.elements.leftside.rand')

		</div>
		<div class="col-md-4 col-lg-4 col-md-h col-lg-h col-t">

			@include('posts.elements.question.question')

			<div class="submit m-t-xxlg m-b-xxlg">

				@include('posts.elements.question.profile')

				<div class="options-list">
					<div class="row">
						<div class="col-xs-4 col-lg-4 option">
							<a href="{{ URL::route('post-text') }}">
								<i class="fa fa-font"></i>
								<span class="option-lbl">Text</span>
							</a>
						</div>
						<div class="col-xs-4 col-lg-4 option">
							<a href="{{ URL::route('post-video') }}">
								<i class="fa fa-youtube"></i>
								<span class="option-lbl">Video</span>
							</a>
						</div>
						<div class="col-xs-4 col-lg-4 option">
							<a href="{{ URL::route('post-photo') }}">
								<i class="fa fa-photo"></i>
								<span class="option-lbl">Photo</span>
							</a>
						</div>
						<div class="col-xs-4 col-lg-4 option">
							<a href="{{ URL::route('post-link') }}">
								<i class="fa fa-link"></i>
								<span class="option-lbl">Link</span>
							</a>
						</div>
						<div class="col-xs-4 col-lg-4 option">
							<a href="{{ URL::route('post-audio') }}">
								<i class="fa fa-audio"></i>
								<span class="option-lbl">Audio</span>
							</a>
						</div>
						<div class="col-xs-4 col-lg-4 option">
							<a href="{{ URL::route('post-vine') }}">
								<i class="fa fa-vine"></i>
								<span class="option-lbl">Vine</span>
							</a>
						</div>
					</div>
				</div>

				<div class="text-center m-t-lg">
					<div class="time-remaining-md">
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
				</div>
			</div>
		</div>
		<div class="col-md-4 col-lg-4 col-md-h col-lg-h rand-posts right-side">

			@include('posts.elements.rightside.header')

			@include('posts.elements.rightside.rand')

		</div>
	</div>
</div>

@stop