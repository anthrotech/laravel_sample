@extends('layouts.default')
@section('content')

<div class="profile content-wrapper">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
			<h2>Posts</h2>
		</div>
		<div class="col-md-12 col-lg-12">
			<div class="row">
				<div class="col-lg-3">
					@include('profile.dashboard.sidebarnav')

					@include('elements.submit')
				</div>
				<div class="col-lg-9">
					<div class="panel-wrapper">				
							<div class="lg-h">
							   	<div class="row-lg-h">
   									<div class="col-lg-4">
   										<strong>Username</strong>
   									</div>
   									<div class="col-lg-6">
   										<strong>Question/Answer</strong>
   									</div>
   									<div class="col-lg-2">
   										<strong>Action</strong>
   									</div>
   								</div>
							@foreach ($posts as $post)
   								<div class="row-lg-h">
   									<div class="col-lg-4">
   										<a href="../profile/{{ $post->username }}">{{ $post->username }}</a>
   									</div>
   									<div class="col-lg-6">
   										<strong>{{ $post->question }}</strong><br/>
   										{{ $post->selected_option }}
   									</div>
   									<div class="col-lg-2">
   										@if ($post->is_active == '1')
   											<a href="../admin/posts/{{ $post->id }}/deactivate" onclick="return confirm('Are you sure you want to deactivate this item?');"><i class="fa fa-times" title="Deactivate Post"></i></a>
   										@else
										   	<a href="../admin/posts/{{ $post->id }}/activate" onclick="return confirm('Are you sure you want to activate this item?');"><i class="fa fa-plus" title="Activate Post"></i></a>
   										@endif
   										<a href="../post/{{ $post->id }}/{{ $post->title}}"><i class="fa fa-info-circle"></i></a>
   									</div>
   								</div>
							@endforeach
							</div>
						<p><?php echo $posts->links(); ?></p>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>

@stop