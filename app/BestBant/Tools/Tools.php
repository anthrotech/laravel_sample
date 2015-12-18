<?php

namespace BestBant\Tools;

use Config;

class Tools {

	public function hash($unique = '')
	{
        $rand = mt_rand(100, 10000000);
        $date = date("YmdHisu");
		$key = Config::get('app.key');
        $hash = md5($date . $rand . $key . $unique);

        return $hash;
	}


	public function slug($string, $pat = "-")
	{
		$table = [
			'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A',
			'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O',
			'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a',
			'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n',
			'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r',
		];

		// Convert special characters to the closest ascii character equivalent
		$slug = strtr($string, $table);

		// Replace non letter or digits by $pat
		$slug = preg_replace('~[^\\pL\d]+~u', $pat, $slug);

		// Trim by $pat
		$slug = trim($slug, $pat);

		// Lowercase
		$slug = strtolower($slug);

		// Remove unwanted characters
		$slug = preg_replace('~[^-\w]+~', '', $slug);

		return $slug;
	}


	public function minToHrs($min)
	{
		$min = (int)$min;

		if ($min < 1)
			return $min;

		$hrs = floor($min / 60);
		$min = $min % 60;

		if ($min > 0) {
			$time = sprintf('%d hours %d minutes', $hrs, $min);
		} else {
			$time = sprintf('%d hours', $hrs);
		}

		return $time;
	}


	public function generateUrl($params = [])
	{
		$domain = Config::get('app.url');
		$uri = implode('/', $params);
		$url = $domain . '/' . $uri;

		return $url;
	}


	public function fallBack($old, $default)
	{
		$value = empty($old) ? $default : $old;

		return $value;
	}

}