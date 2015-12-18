@extends('layouts.default')
@section('content')

<div class="profile content-wrapper">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
			<h2>Questions</h2>
		</div>
		<div class="col-md-12 col-lg-12">
			<div class="row">
				<div class="col-lg-3">
					@include('profile.dashboard.sidebarnav')

					@include('elements.submit')
				</div>
				<div class="col-lg-9">
					<div class="panel-wrapper">				
						<p><i class="fa fa-plus"></i>&nbsp; <a href="{{ URL::route('admin.question.new') }}">New Question</a></p>
							<div class="lg-h">
							   	<div class="row-lg-h">
   									<div class="col-lg-6">
   										<strong>Question/Answers</strong>
   									</div>
   									<div class="col-lg-2">
   										<strong>Start Date</strong>
   									</div>
   									<div class="col-lg-2">
   										<strong>Action</strong>
   									</div>
   								</div>
							@foreach ($questions as $q)
   								<div class="row-lg-h">
   									<div class="col-lg-6">
   										<strong>{{ $q->question }}</strong>
   										<br>
   										{{ $q->left_option }} | {{ $q->right_option }}
   									</div>
   									<div class="col-lg-2">
   										{{ $q->start_at }}
   									</div>
   									<div class="col-lg-2">
   										@if ($q->is_active == '1')
   											<a href="../admin/questions/{{ $q->id }}/deactivate" onclick="return confirm('Are you sure you want to deactivate this item?');"><i class="fa fa-times"></i></a>
   										@else
										   	<a href="../admin/questions/{{ $q->id }}/activate" onclick="return confirm('Are you sure you want to activate this item?');"><i class="fa fa-plus"></i></a>
   										@endif
   										<a href="../admin/questions/{{ $q->id }}/show"><i class="fa fa-pencil"></i></a>
   									</div>
   								</div>
							@endforeach
							</div>
						<p><?php echo $questions->links(); ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop