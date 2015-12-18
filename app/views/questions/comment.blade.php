@extends('layouts.default')
@section('content')

<div class="question">
	<div class="row">
		<div class="col-md-4 col-lg-4 random-comments leftSide">
			<h1 class="text-left">Russia <span class="vote-percentage">68%</span></h1>
			<div class="media">
				<div class="pull-left avatar">
					<a href="#"><img class="media-object" src="{{ asset('img/avatar/avatar1.jpg') }}" alt="..."></a>
				</div>
				<div class="media-body">
					<h4 class="media-heading"><i class="fa fa-comments-o"></i> Subject heading long text here</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipis. commodi culpa deserunt neque odio!</p>
				</div>
			</div>
			<div class="media">
				<div class="pull-left avatar">
					<a href="#"><img class="media-object" src="{{ asset('img/avatar/avatar2.jpg') }}" alt="..."></a>
				</div>
				<div class="media-body">
					<h4 class="media-heading"><i class="fa fa-vine"></i> Subject heading long text here</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipis. commodi culpa deserunt neque odio!</p>
				</div>
			</div>
			<div class="media">
				<div class="pull-left avatar">
					<a href="#"><img class="media-object" src="{{ asset('img/avatar/avatar3.jpg') }}" alt="..."></a>
				</div>
				<div class="media-body">
					<h4 class="media-heading"><i class="fa fa-microphone"></i> Subject heading long text here</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipis. commodi culpa deserunt neque odio!</p>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-lg-4">
			<div class="dark-bubble text-center">
				<p>Which country should have control over Crimea?<br>Russia or Ukraine?</p>
			</div>
			<div class="current-comment">
				<div class="media">
					<a class="pull-left" href="#">
						<img class="media-object" src="{{ asset('img/avatar/avatar2.jpg') }}" alt="...">
					</a>
					<div class="media-body">
						<h4 class="media-heading"><a href="">Jhon Doe <span class="view-profile">View profile</span></a></h4>
					</div>
				</div>
				<h3>A Strong Title is Crucial to Gain Votes</h3>
				<div class="content">
					<p>This is a sample BestBant text response. Responses will be limited to one hundred and forty words, per agreed-upon Phase One deliverables. Anyone registered on the site can post once they have logged in. Site visitors can submit a response in a number of formats; video, photo, link, and audio file.</p>
					<p>Site visitors vote on submissions and the most popular ones will appear on the Leading Submissions page. Randomly selected responses are populated on the page where visitors can read or submit a post. This sample post should give us a good idea of what (exactly) one hundred and forty words might look like.</p>
					<p>Text postings will be automatically moderated for profanity and/or inappropriate comments. At this time we have not decided how other media types will be moderated, but we will.</p>
					<div class="options">

					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-lg-4 random-comments rightSide">
			<h1 class="text-right">Ukraine <span class="vote-percentage">68%</span></h1>
			<div class="media">
				<div class="pull-right avatar">
					<a href="#"><img class="media-object" src="{{ asset('img/avatar/avatar1.jpg') }}" alt="..."></a>
				</div>
				<div class="media-body">
					<h4 class="media-heading"><i class="fa fa-camera"></i> Subject heading long text here</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipis. commodi culpa deserunt neque odio!</p>
				</div>
			</div>
			<div class="media">
				<div class="pull-right avatar">
					<a href="#"><img class="media-object" src="{{ asset('img/avatar/avatar2.jpg') }}" alt="..."></a>
				</div>
				<div class="media-body">
					<h4 class="media-heading"><i class="fa fa-link"></i> Subject heading long text here</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipis. commodi culpa deserunt neque odio!</p>
				</div>
			</div>
			<div class="media">
				<div class="pull-right avatar">
					<a href="#"><img class="media-object" src="{{ asset('img/avatar/avatar3.jpg') }}" alt="..."></a>
				</div>
				<div class="media-body">
					<h4 class="media-heading"><i class="fa fa-video-camera"></i> Subject heading long text here</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipis. commodi culpa deserunt neque odio!</p>
				</div>
			</div>
		</div>
	</div>
</div>

@stop