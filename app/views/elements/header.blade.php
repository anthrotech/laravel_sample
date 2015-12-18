<div class="navbar top-stripe" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="{{ URL::route('home') }}">Home</a></li>
				<li><a href="{{ URL::route('submit') }}">Question of the Week</a></li>
				<li><a href="{{ URL::route('page.show'),'?p=wizards' }}">Wizards</a></li>
				<li><a href="{{ URL::route('page.show'),'?p=connectors' }}">Connectors</a></li>
				<li><a href="{{ URL::route('archives') }}">Archives</a></li>
				<li><a href="{{ URL::route('page.show'),'?p=about-site' }}">About The Site</a></li>
				<li><a href="{{ URL::route('contact') }}">Contact</a></li>
			</ul>

			@include('elements.login')

		</div><!--/.navbar-collapse -->
	</div>
</div>