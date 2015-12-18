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

				{{ Form::open(['route' => 'post-video', 'class' => 'm-t']) }}

				{{ Form::hidden('question', $question['id']) }}
				{{ Form::hidden('post_type', 'video') }}

				<div class="form-group">
					{{ $errors->first('option', '<span class="text-danger">:message</span>') }}
					{{ Form::select('option', $options, Input::old('option'), ['class' => 'form-control']) }}
				</div>

				<div class="form-group">
					{{ $errors->first('title', '<span class="text-danger">:message</span>') }}
					{{ Form::text('title', Input::old('title'), ['class' => 'form-control', 'placeholder' => 'Title...']) }}
				</div>

				<div class="form-group">
					{{ $errors->first('description', '<span class="text-danger">:message</span>') }}
					{{ Form::textarea('description', Input::old('description'), ['class' => 'form-control', 'rows' => 5, 'placeholder' => 'Submission...']) }}
				</div>

				<div class="form-group">
					<strong>VIDEO (Embed Link):<br/>Example: http://www.youtube.com/embed/YOUR_VIDEO_CODE<br/>Replace the YOUR_VIDEO_CODE with the code of your video.</strong>
					{{ $errors->first('link', '<span class="text-danger">:message</span>') }}
					<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-video"></i></div>
						{{ Form::text('link', Input::old('link'), ['class' => 'form-control', 'placeholder' => 'http://']) }}
					</div>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-md btn-primary">Submit</button>
					<a href="{{ URL::route('post-options') }}" class="btn btn-md btn-default pull-right">Cancel</a>
				</div>

				{{ Form::close() }}

				<div class="text-center">
					<div class="time-remaining-sm">
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
									<span>Hrs</span>
									<span></span>
									<span>Mins</span>
									<span></span>
									<span>Secs</span>					
								</div>				 				
							</div>
							</div>
						</div>
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

@section('js')
<script>
	$('input[name=link]').on('keyup', function(){
		var link = $(this).val(),
			pat = /^http:\/\//
		valid = String(link).search(pat) !== -1;

		if((link.length > 6 && !valid))
			$(this).val('http://' + link);
	});
</script>
@stop