@extends('layouts.default')
@section('content')

@foreach ($page as $p) 
<div class="content-wrapper">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
			<h2>{{ $p->title }}</h2>
		</div>
		<div class="col-md-12 col-lg-12">
			<div class="content">
				{{ $p->content }}
				<hr class="short">
			</div>
		</div>
	</div>
</div>
@endforeach
@stop