<div class="list-group m-b-xxlg">
	<a href="{{ URL::route('profile', [LoggedInUser::username()]) }}" class="list-group-item {{ Route::current()->getName() == 'profile' ? 'active' : '' }}">
		<i class="fa fa-user"></i>&nbsp;
		 Edit Profile
	</a>
	<a href="{{ URL::route('settings') }}" class="list-group-item {{ Route::current()->getName() == 'settings' ? 'active' : '' }}">
		<i class="fa fa-gears"></i>&nbsp;
		 Settings
	</a>
	<a href="{{ URL::route('archive', [LoggedInUser::username()]) }}" class="list-group-item {{ Route::current()->getName() == 'archive' ? 'active' : '' }}">
		<i class="fa fa-folder-open"></i>&nbsp;
		 My Archive
	</a>
	@if (Session::get('role') == 'admin')
		<a href="#" class="list-group-item active">Admin Options</a>
		<a href="{{ URL::route('admin.pages.list') }}" class="list-group-item {{ Route::current()->getName() == 'admin.pages.list' ? 'active' : '' }}">
			<i class="fa fa-file-text"></i>&nbsp;
			 Pages
		</a>
		<a href="{{ URL::route('admin.posts.list') }}" class="list-group-item {{ Route::current()->getName() == 'admin.posts.list' ? 'active' : '' }}">
			<i class="fa fa-pencil"></i>&nbsp;
			 Posts
		</a>							
		<a href="{{ URL::route('admin.questions.list') }}" class="list-group-item {{ Route::current()->getName() == 'admin.questions.list' ? 'active' : '' }}">
			<i class="fa fa-question"></i>&nbsp;
		 	Questions
		</a>		
		<a href="{{ URL::route('admin.users.list') }}" class="list-group-item {{ Route::current()->getName() == 'admin.users.list' ? 'active' : '' }}">
			<i class="fa fa-users"></i>&nbsp;
		 	Users
		</a>		
	@endif
</div>