@if($posts['right']->isEmpty())
<div class="no-post text-center">
	<p>There is no comments yet!</p>
	<h3>Be the first and submit a response!</h3>
</div>
@endif

@foreach($posts['right'] as $post)
<div class="media">
	<div class="pull-left avatar text-center">
		<a href="{{ URL::route('profile', [$post->user['username']]) }}">
			<img class="media-object" src="{{ Avatar::display($post->user->profile['picture']) }}" alt="{{{ $post->user['username'] }}}">
		</a>
				@if ($post['type'] == 'text')
					<i class="fa fa-font"></i>
				@else
					<i class="fa fa-{{ $post['type'] }}"></i>
				@endif
	</div>
	<div class="media-body">
		<a href="{{ URL::route('post', [$post['id'], $post['slug']]) }}">
			<h4 class="media-heading">{{{ str_limit($post['title'], 30) }}}</h4>
			<p>{{{ str_limit($post['description'], 120) }}}</p>
		</a>
	</div>
</div>
@endforeach