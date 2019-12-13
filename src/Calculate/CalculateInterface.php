<?php
	
namespace CConverter\Calculate;

interface CalculateInterface
{
	/**
     * currency conversion, cache check and fixer.io api connection
     *
     * @param  string|array   $getFrom
	 * @param  string|array   $getTo
	 * @param  float          $amount
	 * @param  int            $short
	 * @param  bool 		  $isCache
	 * @param  int   		  $cacheTime
     * @return string|array
     */
	public function getValues($from, $to, $amount, $short, $isCache, $cacheTime);
}