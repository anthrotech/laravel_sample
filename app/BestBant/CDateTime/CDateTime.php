<?php

namespace BestBant\CDateTime;

use \Carbon\Carbon;

class CDateTime extends Carbon {

	public function formatDate($date, $format)
	{
		$date = self::createFromTimeStamp(strtotime($date));

		return $date->format($format);
	}

	public function postedDate($date, $time = false)
	{
		$format = '\P\o\s\t\e\d \o\n M jS, Y';

		if($time)
			$format .= ' \a\t h:i A';

		return self::formatDate($date, $format);
	}

} 