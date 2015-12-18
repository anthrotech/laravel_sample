@extends('emails.layouts.default')
@section('content')

<p><strong>Notification Type:</strong> {{ $description }}</p>
<p><strong>Question of the Week:</strong> {{ $question }}</p>

@if ($notify_id == '1')
<p><strong>My Points:</strong> {{ $points }}</p>
@elseif ($notify_id == '2')
<p><strong>Leading Answer:</strong> {{ $selected_option }}</p>
<p><strong>Number or Points:</strong> {{ $points }}
@elseif ($notify_id == '3')
<p><strong>Winning Answer:</strong> {{ $selected_option }}</p>
<p><strong>Number of Points:</strong> {{ $points }}</p>
@elseif ($notify_id == '4')
<p><strong>Same Side Answer:</strong> {{ $selected_option }}</p>
<p>The following are other members who have answered the same as you</p>
<?php 
	$members = Profile::getEmailNotificationsSameAnswer($question_id,$selected_option,$user_id);
	if ($members) {
		echo '<ul>';
		foreach ($members as $member) {
			echo '<li><a href="https://www.bestbant.com/profile/'.$member->username.'">'.$member->username.'</a></li>';
		}
		echo '</ul>';		
	}
?>
@endif

@stop