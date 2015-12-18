@extends('layouts.default')
@section('content')

<div class="profile content-wrapper">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
			<h2>Edit Page</h2>
		</div>
		<div class="col-md-12 col-lg-15">
			<div class="row">
				<div class="col-lg-3">
					@include('profile.dashboard.sidebarnav')

					@include('elements.submit')
				</div>
				<div class="col-lg-9">
					<div class="panel-wrapper">				
							@foreach ($pages as $p)
								{{ Form::open(['route' => ['admin.page.update', $p->id], 'class' => 'form-horizontal form-w-bg']) }}
								<div class="form-group">
									{{ Form::label('title', 'Title', ['class' => 'col-sm-2 control-label']) }}
									<div class="col-sm-10">
										{{ Form::text('title', Tools::fallBack(Input::old('username'), $p->title), ['class' => 'form-control']) }}
										{{ $errors->first('title', '<span class="text-danger">:message</span>') }}
									</div>
								</div>									
								<div class="form-group">
									{{ Form::label('slug', 'Slug', ['class' => 'col-sm-2 control-label']) }}
									<div class="col-sm-10">
										{{ Form::text('slug', Tools::fallBack(Input::old('slug'), $p->slug), ['class' => 'form-control']) }}
										{{ $errors->first('slug', '<span class="text-danger">:message</span>') }}
									</div>
								</div>				
								<div class="form-group">
									{{ Form::label('content', 'Content', ['class' => 'col-sm-2 control-label']) }}
									<div class="col-sm-10">								
										{{ $errors->first('content', '<span class="text-danger">:message</span>') }}
										<textarea cols="7" name="content">{{ $p->description }}</textarea>
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

@section('js')
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>
(function(){
	tinymce.init({
		selector : "textarea",
		theme : "modern",
		browser_spellcheck : true,
		plugins : ["lists pagebreak wordcount autosave paste"],
		paste_as_text : true,
		menubar : false,
		toolbar : "bold italic underline strikethrough | blockquote | bullist numlist | removeformat",
		custom_undo_redo_levels : 10
	});
}());
</script>
@stop