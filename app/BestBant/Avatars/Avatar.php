<?php

namespace BestBant\Avatars;

class Avatar {

	public function display($avatar)
	{
		$avatars_path = "img/avatar/" . $avatar;

		$src = asset($avatars_path);

		return $src;
	}

} 