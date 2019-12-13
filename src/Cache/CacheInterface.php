<?php
	
namespace CConverter\Cache;

interface CacheInterface
{
	/**
	 * change cache parameter
     *
     * @param  bool $is
	 * @param  int  $time
     * @return bool
     */
	public static function setCache($is, $time);
}