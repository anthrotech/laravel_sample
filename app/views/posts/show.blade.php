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

			<div class="post m-t-xxlg">

				<div class="media">
					<a class="pull-left" href="{{ URL::route('profile', [$selected_post->user['username']]) }}">
						<img class="media-object" src="{{ Avatar::display($selected_post->user->profile['picture']) }}" alt="{{ $selected_post->user['username'] }}">
					</a>
					<div class="media-body">
						<h4 class="media-heading">
							<a href="{{ URL::route('profile', [$selected_post->user['username']]) }}" class="username">{{ $selected_post->user['username'] }}</a>
							<span class="view-profile"><a href="{{ URL::route('profile', [$selected_post->user['username']]) }}">View profile</a></span>
						</h4>
					</div>
				</div>

				<h3>{{ $selected_post['title'] }}</h3>
				<div class="content scrollable" data-height="260px">
					@if($selected_post['type'] == 'text')
						{{ $selected_post['content'] }}
					@elseif($selected_post['type'] == 'audio')
						<p>{{ $selected_post['content'] }}</p>
						<p>
				 			<audio controls>
						    <source src="{{ asset('img/files/'.$selected_post['post_file']) }}">
							Your browser does not support the audio element.
							</audio> 						
						</p>
					@elseif($selected_post['type'] == 'video')
						<p>{{ $selected_post['content'] }}</p>
						<p>
							<iframe id="ytplayer" type="text/html" width="400" height="390" src="{{ $selected_post['content'] }}?autoplay=1&origin={{ $selected_post['content'] }}" frameborder="0"/>
							</iframe>					
						</p>		
					@elseif($selected_post['type'] == 'vine') 
						<p>{{ $selected_post['content'] }}</p>
						<p>
							<iframe class="vine-embed" src="{{ $selected_post['content'] }}" width="320" height="320" frameborder="0"></iframe><script async src="//platform.vine.co/static/scripts/embed.js" charset="utf-8"></script>						
						</p>				
					@elseif($selected_post['type'] == 'link')
						<p>{{ $selected_post['description'] }}</p>
						<p>Click on the link below to read more :<br>
						<a href="{{ $selected_post['content'] }}" target="_blank">{{ $selected_post['content'] }}</a></p>
					@elseif($selected_post['type'] == 'photo')
						<p>{{ $selected_post['content'] }}</p>
						<p><img src="{{ asset('img/files/'.$selected_post['post_file']) }}" alt="{{ $selected_post['title'] }}">
					@endif
				</div>

				<div class="actions clearfix m-t-sm">
					<div class="posted pull-left">
						{{ CDateTime::postedDate($selected_post['created_at']) }}
					</div>
					<a href="{{ URL::route('thumbs-up', [$selected_post['id'], $selected_post['slug']]) }}" class="thumbs-up pull-right">
						<i class="fa fa-thumbs-up"></i> {{ ($selected_post['points'] > 1) ? "{$selected_post['points']} Points" : "{$selected_post['points']} Point" }}
					</a>
				</div>

				<hr>

				<div class="m-b clearfix">
					<div class="time-remaining-sm pull-left">
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
					<div class="pull-right text-center">
						<a href="{{ URL::route('post-options') }}" class="btn btn-lg btn-primary">Submit</a>
						@if (!Auth::check())
							<p class="m-t-xs">Must be <strong>Logged In</strong><br> to submit a comment</p>
						@endif
					</div>
				</div>

				<div class="report">
					<a href="{{ URL::route('report-post', array('id' => $selected_post['id'])) }}"><i class="fa fa-flag"></i><br /><span style="font-size: 10px;font-weight:bold;">Report</span></a>
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