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
			<div class="submit-options">
				<div class="media">
					<a class="pull-left" href="#">
						<img class="media-object" src="{{ asset('img/avatar/avatar2.jpg') }}" alt="...">
					</a>
					<div class="media-body">
						<h4 class="media-heading"><a href="">Jhon Doe <span class="view-profile">View profile</span></a></h4>
					</div>
				</div>
				<div class="options-list">
					<div class="row">
						<div class="col-xs-4 col-lg-4 option">
							<a href="{{ URL::to('comment') }}"><i class="fa fa-comments-o"></i></a>
						</div>
						<div class="col-xs-4 col-lg-4 option">
							<a href=""><i class="fa fa-video-camera"></i></a>
						</div>
						<div class="col-xs-4 col-lg-4 option">
							<a href=""><i class="fa fa-camera"></i></a>
						</div>
						<div class="col-xs-4 col-lg-4 option">
							<a href=""><i class="fa fa-link"></i></a>
						</div>
						<div class="col-xs-4 col-lg-4 option">
							<a href=""><i class="fa fa-microphone"></i></a>
						</div>
						<div class="col-xs-4 col-lg-4 option">
							<a href=""><i class="fa fa-vine"></i></a>
						</div>
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