<div class="dark-bubble text-center">
	<a href="{{ URL::route('post-options') }}">
		<p>
			{{{ ucfirst($question['question']) }}}?<br>
			{{{ ucfirst($question['left_option']) }}} or {{{ ucfirst($question['right_option']) }}}?
		</p>
	</a>
</div>