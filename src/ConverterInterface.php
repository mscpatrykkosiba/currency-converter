<?php
	
namespace CConverter;

interface ConverterInterface
{
	/**
	 * initial currency conversion
     *
     * @param  string|array $from
	 * @param  string|array $to
	 * @param  float 		$amount
	 * @param  bool			$short
     * @return string|array
     */
	public function cconv($from, $to, $amount);
}