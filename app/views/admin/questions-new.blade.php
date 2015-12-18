@extends('layouts.default')
@section('content')

<div class="profile content-wrapper">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
			<h2>Add Question</h2>
		</div>
		<div class="col-md-12 col-lg-15">
			<div class="row">
				<div class="col-lg-3">
					@include('profile.dashboard.sidebarnav')

					@include('elements.submit')
				</div>
				<div class="col-lg-9">
					<div class="panel-wrapper">	
								{{ Form::open(['route' => ['admin.question.create'], 'class' => 'form-horizontal form-w-bg']) }}
								<div class="form-group">
									{{ Form::label('question', 'Question', ['class' => 'col-sm-2 control-label']) }}
									<div class="col-sm-10">
										{{ Form::text('question', Tools::fallBack(Input::old('question'), ''), ['class' => 'form-control']) }}
										{{ $errors->first('question', '<span class="text-danger">:message</span>') }}
									</div>
								</div>									
								<div class="form-group">
									{{ Form::label('slug', 'Slug', ['class' => 'col-sm-2 control-label']) }}
									<div class="col-sm-10">
										{{ Form::text('slug', Tools::fallBack(Input::old('slug'), ''), ['class' => 'form-control']) }}
										{{ $errors->first('slug', '<span class="text-danger">:message</span>') }}
									</div>
								</div>			
								<div class="form-group">
									{{ Form::label('left_option', 'Left Option', ['class' => 'col-sm-2 control-label']) }}
									<div class="col-sm-10">
										{{ Form::text('left_option', Tools::fallBack(Input::old('left_option'), ''), ['class' => 'form-control']) }}
										{{ $errors->first('left_option', '<span class="text-danger">:message</span>') }}
									</div>
								</div>		
								<div class="form-group">
									{{ Form::label('right_option', 'Right Option', ['class' => 'col-sm-2 control-label']) }}
									<div class="col-sm-10">
										{{ Form::text('right_option', Tools::fallBack(Input::old('right_option'), ''), ['class' => 'form-control']) }}
										{{ $errors->first('right_option', '<span class="text-danger">:message</span>') }}
									</div>
								</div>	
								<div class="form-group">
									{{ Form::label('start_at', 'Start Date (Format: YY-MM-DD)', ['class' => 'col-sm-2 control-label']) }}
									<div class="col-sm-10">
											<input id="dp1" name="start_at" type="text" value="">
											{{ $errors->first('start_at', '<span class="text-danger">:message</span>') }}
									</div>
								</div>	
								<div class="form-group">
									{{ Form::label('end_at', 'End Date (Format: YY-MM-DD)', ['class' => 'col-sm-2 control-label']) }}
									<div class="col-sm-10">
											<input id="dp1" name="end_at" type="text" value="">
											{{ $errors->first('end_at', '<span class="text-danger">:message</span>') }}
									</div>
								</div>																																																										

							<div class="form-group text-right">
								<button type="reset" class="btn btn-md btn-default">Cancel</button>
								<button type="submit" class="btn btn-md btn-primary">Add Question</button>
							</div>
							{{ Form::close() }}							
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop