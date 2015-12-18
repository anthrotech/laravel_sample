@extends('layouts.default')
@section('content')

<div class="profile content-wrapper">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
			<h2>Edit User</h2>
		</div>
		<div class="col-md-12 col-lg-15">
			<div class="row">
				<div class="col-lg-3">
					@include('profile.dashboard.sidebarnav')

					@include('elements.submit')
				</div>
				<div class="col-lg-9">
					<div class="panel-wrapper">				
							@foreach ($user as $u)
								{{ Form::open(['route' => ['admin.user.update', $u->id], 'class' => 'form-horizontal form-w-bg']) }}
								<div class="form-group">
									{{ Form::label('username', 'Username', ['class' => 'col-sm-2 control-label']) }}
									<div class="col-sm-10">
										{{ Form::text('username', Tools::fallBack(Input::old('username'), $u->username), ['class' => 'form-control']) }}
										{{ $errors->first('username', '<span class="text-danger">:message</span>') }}
									</div>
								</div>									
								<div class="form-group">
									{{ Form::label('email', 'Email Address', ['class' => 'col-sm-2 control-label']) }}
									<div class="col-sm-10">
										{{ Form::text('email', Tools::fallBack(Input::old('email'), $u->email), ['class' => 'form-control']) }}
										{{ $errors->first('email', '<span class="text-danger">:message</span>') }}
									</div>
								</div>																										
							@endforeach
							
							<div class="form-group text-right">
								<button type="reset" class="btn btn-md btn-default">Cancel</button>
								<button type="submit" class="btn btn-md btn-primary">Save changes</button>
							</div>
							{{ Form::close() }}							
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop