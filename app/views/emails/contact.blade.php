@extends('emails.layouts.default')
@section('content')

<p>
	Full Name: <strong>{{{ $full_name }}}</strong><br>
	Email Address: <strong>{{{ $email }}}</strong>
</p>
<p>
	Message: <br>
	{{{ $content }}}
</p>

@stop