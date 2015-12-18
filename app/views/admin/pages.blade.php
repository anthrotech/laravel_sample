@extends('layouts.default')
@section('content')

<div class="profile content-wrapper">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
			<h2>Pages</h2>
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
   										<strong>Title</strong>
   									</div>
   									<div class="col-lg-4">
   										<strong>Slug</strong>
   									</div>
   									<div class="col-lg-4">
   										<strong>Action</strong>
   									</div>
   								</div>
							@foreach ($pages as $page)
   								<div class="row-lg-h">
   									<div class="col-lg-4">
   										{{ $page->title }}
   									</div>
   									<div class="col-lg-4">
   										{{ $page->slug }}
   									</div>
   									<div class="col-lg-4">
   										<a href="../admin/pages/{{ $page->id }}/delete" onclick="return confirm('Are you sure you want to deactivate this item?');"><i class="fa fa-times"></i></a>
   										<a href="../admin/pages/{{ $page->id }}/show"><i class="fa fa-pencil"></i></a>
   									</div>
   								</div>
							@endforeach
							</div>
						<p><?php echo $pages->links(); ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop