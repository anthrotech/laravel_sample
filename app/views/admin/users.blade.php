@extends('layouts.default')
@section('content')

<div class="profile content-wrapper">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
			<h2>Users</h2>
		</div>
		<div class="col-md-12 col-lg-15">
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
   										<strong>Email</strong>
   									</div>
   									<div class="col-lg-2">
   										<strong>Action</strong>
   									</div>
   								</div>
							@foreach ($users as $user)
   								<div class="row-lg-h">
   									<div class="col-lg-4">
   										{{ $user->username }}
   									</div>
   									<div class="col-lg-6">
   										{{ $user->email }}
   									</div>
   									<div class="col-lg-2">
   										@if ($user->is_active == '1')
   											<a href="../admin/users/{{ $user->id }}/deactivate" onclick="return confirm('Are you sure you want to deactivate this item?');"><i class="fa fa-times" title="Deactivate User"></i></a>
   										@else
										   	<a href="../admin/users/{{ $user->id }}/activate" onclick="return confirm('Are you sure you want to activate this item?');"><i class="fa fa-plus" title="Activate User"></i></a>
   										@endif
   										<a href="../admin/users/{{ $user->id }}/show"><i class="fa fa-pencil"></i></a>
   									</div>
   								</div>
							@endforeach
							</div>
						<p><?php echo $users->links(); ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop