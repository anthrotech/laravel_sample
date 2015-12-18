<div class="aside text-center">
	<h3>Question of the week</h3>

	<p class="question"><?php if ($question):?>{{{ ucfirst($question['question']) }}}? {{{ ucfirst($question['left_option']) }}} or {{{ ucfirst($question['right_option']) }}}?<?php else:?>No Question Entered for this Week. Please contact Site Administrator.<?php endif;?></p>

	<a href="{{ URL::route('post-options') }}" class="btn btn-lg m-t-lg btn-primary">Submit</a>

	@if (!Auth::check())
		<p class="m-t-xs">Must be <strong>Logged In</strong><br> to submit a comment</p>
	@endif

	<hr>

	<div class="time-remaining-md">

		<h4>Time Remaining :</h4>

		<div class="centered">
			<div class="time">
				<div class="digits">
					<script>
						// set the date we're counting down to
						<?php if ($remaining_time):?>
							var target_date = new Date('{{ $remaining_time['due_date_short_month'] }}, {{ $remaining_time['due_date_day'] }}, {{ $remaining_time['due_date_year'] }}').getTime();
						<?php else:?>
							var target_date = new Date('Jan','01','1900');
						<?php endif;?>
							    
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

		<div class="date"><?php if ($remaining_time):?>{{ $remaining_time['due_date'] }}<?php endif;?></div>

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