@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('js/markitup/skins/markitup/style.css') }}">
<link rel="stylesheet" href="{{ asset('js/markitup/sets/default/style.css') }}">
@stop

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

				{{ Form::open(['route' => 'post-audio', 'files' => true, 'class' => 'm-t']) }}

				{{ Form::hidden('question', $question['id']) }}
				{{ Form::hidden('post_type', 'audio') }}

				<div class="form-group">
					{{ $errors->first('option', '<span class="text-danger">:message</span>') }}
					{{ Form::select('option', $options, Input::old('option'), ['class' => 'form-control']) }}
				</div>

				<div class="form-group">
					{{ $errors->first('title', '<span class="text-danger">:message</span>') }}
					{{ Form::text('title', Input::old('title'), ['class' => 'form-control', 'placeholder' => 'Title...']) }}
				</div>

				<div class="form-group">
					{{ $errors->first('content', '<span class="text-danger">:message</span>') }}
					{{ Form::textarea('content', Input::old('content'), ['class' => 'auto-hint', 'rows' => 7, 'title' => 'Submission...']) }}
				</div>
				
				<div class="form-group">
					<strong>Audio (MP3 or WAV):</strong>
					{{ $errors->first('post_file', '<span class="text-danger">:message</span>') }}
					{{ Form::file('post_file', ['class' => 'form-control']) }}
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
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>
(function(){
	tinymce.init({
		selector : "textarea",
		theme : "modern",
		browser_spellcheck : true,
		plugins : ["lists pagebreak wordcount autosave paste"],
		paste_as_text : true,
		menubar : false,
		toolbar : "bold italic underline strikethrough | blockquote | bullist numlist | removeformat",
		custom_undo_redo_levels : 10
	});
}());
</script>
@stop