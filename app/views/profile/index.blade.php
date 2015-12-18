@extends('layouts.default')
@section('content')

<div class="profile content-wrapper">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
			<h2>Profile</h2>
		</div>
		<div class="col-md-12 col-lg-12">
			<div class="row">
				<div class="col-lg-3">

					@include('elements.submit')

				</div>

				<div class="col-lg-9">
				  <div class="panel-wrapper">
					<div class="profile-details">
						<div class="row">
							<div class="col-lg-2">
								<div class="profile-infos">
									<div class="avatar">
										<a href="#"><img src="{{ Avatar::display('default_avatar.jpg') }}" alt="..."></a>
									</div>
									<ul class="infos list-unstyled">
										<li class="address"><i class="fa fa-map-marker"></i>{{ $profile->city }},<br/> {{ $profile->state }}</li>
										@if ($profile->interests)
											<li class="interest"><?php $trunc_interests = str_replace(",","<br />",$profile->interests); echo $trunc_interests; ?></li>
										@endif
										<li class="socials">
											@if ($profile->facebook)
												<a href="{{ $profile->facebook }}" class="fb" target="newwin"><i class="fa fa-facebook-square"></i></a>
											@endif
											@if ($profile->twitter)
												<a href="{{ $profile->twitter }}" class="tw" target="newwin"><i class="fa fa-twitter-square"></i></a>
											@endif
											@if ($profile->url)
												<a href="{{ $profile->url }}" class="www" target="newwin"><i class="fa fa-globe"></i></a>
											@endif											
										</li>
										
									</ul>
								</div>
							</div>

							<div class="col-lg-10">
								<div class="profile-username">
									<h3>{{ $profile->full_name }} <span class="bants">({{ $num_posts }} <i class="icon-bant"></i>)</span></h3>
									<span class="username">{{ $user->username }}</span>
								</div>

								<div class="profile-posts">
									<h3>Bants</h3>
									<div class="scrollable" data-height="300px">
									
										@foreach ($bants as $bant)
											<div class="post media">
												<div class="pull-left icons">
													<div class="icon">
														@if ($bant->type == 'text')
															<i class="fa fa-font"></i>
														@else
															<i class="fa fa-{{ $bant->type }}"></i>
														@endif
													</div>
												</div>
												<div class="media-body">
													<h4 class="media-heading">{{ $bant->title }}</h4>
													<p>{{ $bant->content }}</p>
													<div class="post-details"><span class="date">Posted: {{ date("M d, Y H:i:s",strtotime($bant->created_at)) }}</span> - <span class="votes">{{ $bant->points }} Points</span></div>
												</div>
											</div>										
										@endforeach
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
</div>

@stop