@extends('layouts.default')
@section('content')

<div class="thinking-bubbles">
	<div class="row">
		<div class="col-md-4 col-lg-4">
			<h2 class="text-center Ques">
				<a href="" class="ques" data-target="info1">Want to <strong>be heard?</strong></a>
			</h2>
		</div>
		<div class="col-md-4 col-lg-4">
			<div class="dark-bubble text-center active origin" onclick="location.href='{{ URL::route('post-options') }}';" style="cursor: pointer;">
				<a href="{{ URL::route('submit') }}">
					<h2>Question of the Week</h2>
					<p>
					<?php if (!empty($question)):?>
						{{{ ucfirst($question['question']) }}}?<br>
						{{{ ucfirst($question['left_option']) }}} or {{{ ucfirst($question['right_option']) }}}?
					<?php else:?>
						No Question Entered for this Week. Please contact Site Administrator.
					<?php endif;?>
					</p>
				</a>
				<a href="{{ URL::route('post-options') }}" class="btn btn-lg btn-primary">Submit</a>
			</div>

			<div class="dark-bubble text-center info1 collapse">
				<h2>Want to be heard?</h2>
				<p>Everyone has an opinion about current events. In the age of social media our need to be heard is growing. BestBant wants you to share your opinion when events unfold.</p>
			</div>

			<div class="dark-bubble text-center info2 collapse">
				<h2>Want to hear others?</h2>
				<p>Are you tired of experts telling you how to think? See the powerful voices of your peers and fellow citizens. Discover the Churchills and Dylans of our time before forming your own opinion.</p>
			</div>

			<div class="dark-bubble-orange text-center info3 collapse">
				<h2>Intelligent Language</h2>
				<p>BestBant is the place for powerful citizen opinion making in response to weekly events. BestBant believes it is not what you say but how you say it. Lincoln, Churchill, King, JFK and Dylan were practitioners of intelligent language and their words captured the imagination of the country. BestBant hopes the wisdom of crowds can change hearts and move hearts.</p>
			</div>

			<div class="dark-bubble-gray text-center info4 collapse">
				<h2>What?</h2>
				<p>BestBant will post a question each week in response to consequential events. We want your strongest voice in text, pictures, music or video. Our electronic bulletin board will show opposing citizen opinions rated by your peers.</p>
			</div>

			<div class="dark-bubble-blue text-center info5 collapse">
				<h2>Win</h2>
				<p>Be the winner of the weekly question and become a BestBant scholar. You can show off your digital certificate on your social media portfolios.</p>
			</div>

			<div class="dark-bubble-orange text-center info6 collapse">
				<h2>Slow News Movement</h2>
				<p>In a noisy and hurried world, visit BestBant to voice an opinion or hear others. Join the Slow News Movement and understand the two sides of any issue through voices not unlike your own. Hear the voices and feel the emotions of reasonable and reasoned people on the most important and pressing event of the week. By providing citizen opinions on both sides of current issues we are the pulse of your community.</p>
			</div>

			<div class="dark-bubble-blue text-center info7 collapse">
				<h2>Past Winners</h2>
				<p><a href="{{ URL::route('archives') }}" style="text-decoration: underline;color:#ffffff;">Check out our Past Winners</a></p>
			</div>

			<div class="dark-bubble-gray text-center info8 collapse">
				<h2>Why?</h2>
				<p>Do you want to be heard or hear others when things happen? Every opinion will be posted. You will see two sides of every issue. Use interaction will determine the winner. Become a BestBant Scholar.</p>
			</div>

		</div>
		<div class="col-md-4 col-lg-4">
			<h2 class="text-center Ques">
				<a href="" class="ques" data-target="info2">Want to <strong>hear <br>others?</strong></a>
			</h2>
		</div>
	</div>
	<!-- Questions Bubbles -->
	<a href="" class="bubble lb-orange" data-target="info3">Intelligent <br>Language</a>
	<a href="" class="bubble lb-gray" data-target="info4">WHAT</a>
	<a href="" class="bubble lb-cyan" data-target="info5">Win</a>
	<a href="" class="bubble rb-orange" data-target="info6">Slow News <br>Movement</a>
	<a href="" class="bubble rb-cyan" data-target="info7">Past <br>Winners</a>
	<a href="" class="bubble rb-gray" data-target="info8">WHY</a>
</div>
<div class="people text-center">
	<img src="{{ asset('img/people.png') }}" alt="">
	<h1>When things happen we want your opinion.</h1>
</div>

@stop