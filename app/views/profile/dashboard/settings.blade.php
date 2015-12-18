@extends('layouts.default')
@section('content')

<div class="settings content-wrapper">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
			<h2>Settings</h2>
		</div>
		<div class="col-md-12 col-lg-12">
			<div class="row">
				<div class="col-lg-3">

					@include('profile.dashboard.sidebarnav')

					@include('elements.submit')

				</div>

				<div class="col-lg-9">
					<div class="panel-wrapper">
						{{ Form::open(['route' => ['settings'], 'class' => 'form-horizontal form-w-bg']) }}
						@foreach ($email_notifications as $email_notify) 
							<div class="form-group">
								{{ $email_notify->list_order }}. {{ $email_notify->description }}						
								<p><strong>Frequency:</strong>
								<?php 
									// Get the Frequency for the Questions
									$frequencies = Profile::emailNotificationsConfig($email_notify->id);
									foreach ($frequencies as $frequency) {
								?>
										<input type="checkbox" name="emailnotificationfreqid[]" value="<?php echo $frequency->id; ?>"<?php $key = array_search($frequency->id, $email_user_settings); if ($key > -1) { echo ' checked="checked"';} ?>> <?php echo $frequency->description; ?>
								<?php 	
									}
								?>								
								</p>
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