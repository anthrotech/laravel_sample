@extends('layouts.default')
@section('content')

<div class="question">
	<div class="row">
		<div class="col-md-4 col-lg-4 top-comments leftSide">
			<h1 class="text-left">Russia <span class="vote-percentage">68%</span></h1>
			<div class="media">
				<div class="pull-left avatar text-center">
					<a href="#"><img class="media-object" src="{{ asset('img/avatar/avatar1.jpg') }}" alt="..."></a>
					<i class="fa fa-comments-o"></i>
				</div>
				<div class="media-body">
					<h4 class="media-heading">Subject heading long text here</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipis. commodi culpa deserunt neque odio!</p>
				</div>
			</div>
			<div class="media">
				<div class="pull-left avatar text-center">
					<a href="#"><img class="media-object" src="{{ asset('img/avatar/avatar2.jpg') }}" alt="..."></a>
					<i class="fa fa-vine"></i>
				</div>
				<div class="media-body">
					<h4 class="media-heading">Subject heading long text here</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipis. commodi culpa deserunt neque odio!</p>
				</div>
			</div>
			<div class="media">
				<div class="pull-left avatar text-center">
					<a href="#"><img class="media-object" src="{{ asset('img/avatar/avatar3.jpg') }}" alt="..."></a>
					<i class="fa fa-microphone"></i>
				</div>
				<div class="media-body">
					<h4 class="media-heading">Subject heading long text here</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipis. commodi culpa deserunt neque odio!</p>
				</div>
			</div>
			<div class="media">
				<div class="pull-left avatar text-center">
					<a href="#"><img class="media-object" src="{{ asset('img/avatar/avatar1.jpg') }}" alt="..."></a>
					<i class="fa fa-comments-o"></i>
				</div>
				<div class="media-body">
					<h4 class="media-heading">Subject heading long text here</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipis. commodi culpa deserunt neque odio!</p>
				</div>
			</div>
			<div class="media">
				<div class="pull-left avatar text-center">
					<a href="#"><img class="media-object" src="{{ asset('img/avatar/avatar2.jpg') }}" alt="..."></a>
					<i class="fa fa-vine"></i>
				</div>
				<div class="media-body">
					<h4 class="media-heading">Subject heading long text here</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipis. commodi culpa deserunt neque odio!</p>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-lg-4">
			<div class="dark-bubble text-center">
				<p>Which country should have control over Crimea?<br>Russia or Ukraine?</p>
			</div>
			<div class="submit-comment text-center">
				<a href="{{ URL::to('options') }}" class="btn btn-xlg btn-primary">Submit</a>
				@if (!Auth::check())
					<p>Must be <strong>Logged In</strong><br> to submit a comment</p>
				@endif
				<hr>
				<h3>Time Remaining :</h3>
				<div class="time-remaining">
					<span>42<small>Hrs</small></span>
					<span>:</span>
					<span>20<small>Mins</small></span>
					<span>:</span>
					<span>37<small>Secs</small></span>
				</div>
				<div class="date">
					13 April - Sunday
				</div>
				<hr>
				<p class="leading"><strong>Leading Bant :</strong><br> <a href="">BrewerBoy_77 = 29 Votes</a></p>
			</div>
		</div>
		<div class="col-md-4 col-lg-4 top-comments rightSide">
			<h1 class="text-right">Ukraine <span class="vote-percentage">68%</span></h1>
			<div class="media">
				<div class="pull-left avatar text-center">
					<a href="#"><img class="media-object" src="{{ asset('img/avatar/avatar1.jpg') }}" alt="..."></a>
					<i class="fa fa-camera"></i>
				</div>
				<div class="media-body">
					<h4 class="media-heading">Subject heading long text here</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipis. commodi culpa deserunt neque odio!</p>
				</div>
			</div>
			<div class="media">
				<div class="pull-left avatar text-center">
					<a href="#"><img class="media-object" src="{{ asset('img/avatar/avatar2.jpg') }}" alt="..."></a>
					<i class="fa fa-link"></i>
				</div>
				<div class="media-body">
					<h4 class="media-heading">Subject heading long text here</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipis. commodi culpa deserunt neque odio!</p>
				</div>
			</div>
			<div class="media">
				<div class="pull-left avatar text-center">
					<a href="#"><img class="media-object" src="{{ asset('img/avatar/avatar3.jpg') }}" alt="..."></a>
					<i class="fa fa-video-camera"></i>
				</div>
				<div class="media-body">
					<h4 class="media-heading">Subject heading long text here</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipis. commodi culpa deserunt neque odio!</p>
				</div>
			</div>
			<div class="media">
				<div class="pull-left avatar text-center">
					<a href="#"><img class="media-object" src="{{ asset('img/avatar/avatar1.jpg') }}" alt="..."></a>
					<i class="fa fa-camera"></i>
				</div>
				<div class="media-body">
					<h4 class="media-heading">Subject heading long text here</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipis. commodi culpa deserunt neque odio!</p>
				</div>
			</div>
			<div class="media">
				<div class="pull-left avatar text-center">
					<a href="#"><img class="media-object" src="{{ asset('img/avatar/avatar2.jpg') }}" alt="..."></a>
					<i class="fa fa-link"></i>
				</div>
				<div class="media-body">
					<h4 class="media-heading">Subject heading long text here</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipis. commodi culpa deserunt neque odio!</p>
				</div>
			</div>
		</div>
	</div>
</div>

@stop