<?php

namespace CConverter\Cache;

class Cache implements CacheInterface
{
	/**
	 * change cache parameter
     *
     * @param  bool $is
	 * @param  int  $time
     * @return bool
     */
	public static function setCache($is, $time)
	{
		if($is==true && is_numeric($time) && is_int($time)){
			$output = true;
		}else{
			$output = false;
		}
		return $output;
	}
}