@extends('layouts.default')
@section('content')

<div class="archives content-wrapper">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
			<h2>Archives</h2>
		</div>
		<div class="col-md-12 col-lg-12">
			<div class="row">
				<div class="col-lg-9">
					<div class="archive-list scrollable" data-height="500px">
						<ul class="list-unstyled">
					        @foreach ($show_questions as $q) 
							<?php 
								$t_bants = Post::getTopBants($q->id);
								if ($t_bants) {
									foreach ($t_bants as $top_bant) {
										if (is_numeric($top_bant->id)) {
											$user  = User::getUserProfile($top_bant->user_id);
											$votes = Vote::getPostVotes($top_bant->id); 
											$post_date = CDateTime::createFromTimeStamp(strtotime($top_bant->created_at));
											$display_post_date = $post_date->formatLocalized('%b %d, %Y');					        
							 ?>
									<li>
									<div class="row">
										<div class="col-lg-3">
											<div class="avatar">
												<a href="#">
													<img src="{{ Avatar::display('default_avatar.jpg') }}" alt="...">
													<?php 
															 echo '<span class="user-name">'.$user[0]->full_name.'</span>';
															 echo '@'.$top_bant->username;
															 echo '<div class="profile-info">';
															 echo '<span class="address"><i class="fa fa-map-marker"></i>'.$user[0]->city.', '.$user[0]->state.'</span>';
															 echo '<span class="post-date">'.$display_post_date.'</span>';
															 echo '<span class="votes">'.count($votes).' votes</span>';
															 echo '</div>';
												 	?>										
												</a>
												<div class="post-type">
													@if ($top_bant->type == 'audio') 
														<i class="fa fa-microphone"></i>
													@elseif ($top_bant->type == 'link')
														<i class="fa fa-link"></i>	
													@elseif ($top_bant->type == 'photo')
														<i class="fa fa-camera"></i>
													@else 
														<i class="fa fa-font"></i>
													@endif
													<div class="icon-bant"></div>
														<p style="font-size:10px; color:#0c99a0; text-align:center;">
														Best Bant
														<br/>
														of
														<br/>
														the Week
														</p>														
												</div>
											</div>
										</div>
										<div class="col-lg-9">
											<div class="user-comment">
												<h4>Question: {{ $top_bant->question }}</h4>
												<p><strong>{{ $top_bant->title }}</strong></p>
												<p><strong>Answer:</strong> {{ $top_bant->selected_option }}</p>
												<p>{{ $top_bant->content }}</p>
												<p><strong>Points:</strong> {{ $top_bant->points }}</p>
											</div>
										</div>
									</div>
									</li>								
							<?php 
										}
									}
								}
							?>					        
						    @endforeach						
						</ul>
					</div>
				</div>
				<div class="col-lg-3">

					@include('elements.submit')

				</div>
			</div>
		</div>
	</div>
</div>

@stop