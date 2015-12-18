@extends('layouts.default')
@section('content')

<div class="archive content-wrapper">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
			<h2>My Archive</h2>
		</div>
		<div class="col-md-12 col-lg-12">
			<div class="row">
				<div class="col-lg-3">

					@include('profile.dashboard.sidebarnav')

					@include('elements.submit')

				</div>

				<div class="col-lg-9">
					<div class="panel-wrapper">
						<div class="row">
							<div class="col-lg-2">
								<div class="profile-infos">
									<div class="avatar">
										<img src="{{ Avatar::display($profile->picture) }}" alt="{{{ $profile->full_name }}}">
									</div>
									<ul class="infos list-unstyled">
										<li class="address"><i class="fa fa-map-marker"></i> {{ $profile-> city}}, {{ $profile->state }}</li>
										<li class="website"><a href="">{{{ $user->username }}}</a></li>
									</ul>
								</div>
							</div>

							<div class="col-lg-10">
								<div class="profile-username">
									<h3>{{{ $profile->full_name }}} <span class="bants">(3 <i class="icon-bant"></i>)</span></h3>
									<span class="username">@{{{ $user->username }}}</span>
								</div>

								<div class="profile-posts">
									<h3>Bants</h3>
									<div class="scrollable" data-height="460px">
										@if($posts->isEmpty())

											<p>You haven't posted anything yet!</p>

										@else

										@foreach($posts as $post)

										<div class="post media">
											<div class="pull-left icons">
												<div class="icon">
													@if ($post->type == 'text')
														<i class="fa fa-font"></i>
													@else
														<i class="fa fa-{{ $post->type }}"></i>
													@endif
												</div>
												<?php 
													$top_bant = Post::getTopBants($post->question_id);
													if ($top_bant) {
												?>
														<div class="icon-bant"></div>
																<p style="font-size:10px; color:#0c99a0; text-align:center;">
																Best Bant
																<br/>
																of
																<br/>
																the Week
																</p>													
												<?php 
													}
												?>
											</div>
											<div class="media-body">
												<h4>{{ $post->question->question; }}</h4>
												<a href="{{ URL::route('post', [$post->id, $post->slug]) }}">
													<h4 class="media-heading">{{{ $post->title }}}</h4>
													<p>{{{ str_limit($post->description, 120) }}}</p>
												</a>
												<div class="post-details">
													<span class="date">{{ CDateTime::postedDate($post->created_at, true) }}</span> -
													<span class="points">{{ ($post->points > 1) ? "{$post->points} Points" : "{$post->points} Point" }}</span>
												</div>
											</div>
										</div>

										@endforeach
										
										@endif

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop