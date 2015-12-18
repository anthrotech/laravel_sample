<div class="media">
	<a class="pull-left" href="{{ URL::route('profile', [LoggedInUser::username()]) }}">
		<img class="media-object" src="{{ Avatar::display(LoggedInUser::picture()) }}" alt="{{ LoggedInUser::username() }}">
	</a>
	<div class="media-body">
		<h4 class="media-heading">
			<a href="{{ URL::route('profile', [LoggedInUser::username()]) }}" class="username">{{ LoggedInUser::username() }}</a>
			<span class="view-profile"><a href="{{ URL::route('profile', [LoggedInUser::username()]) }}">View profile</a></span>
		</h4>
	</div>
</div>