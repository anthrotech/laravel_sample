@extends('emails.layouts.default')
@section('content')

<p>Hey, you're almost done with the sign-up process!</p>

<hr>

<p><a href="{{ URL::to(e($url)) }}">Confirm Your Account</a></p>

<hr>

<p>If you received this message in error and did not sign up for BestBant, <strong>Please let us know.</strong></p><br>

@stop