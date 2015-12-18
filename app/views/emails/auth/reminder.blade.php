@extends('emails.layouts.default')
@section('content')

<p>Dear BestBant User,<br><br>
You requested that your password be reset. Your old password will be active until you create a new password. Click the link below to complete your password reset. you may be asked to verify your identity before resetting your password.</p>

<hr>

<p>{{ URL::to('password/reset', array($token)) }}</p>

<hr>

<p><strong>Please note : </strong>This link is only valid for one password reset and must be used within {{ Tools::minToHrs(Config::get('auth.reminder.expire', 1440)) }}.</p>

<p>If you did not initiate this request, and you think someone else may be attempting to use your BestBant account, just ignore this email and nothing will happen.</p><br>

@stop




