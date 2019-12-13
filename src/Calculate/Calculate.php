<?php

namespace CConverter\Calculate;

use CConverter\Cache\CacheFile;

class Calculate implements CalculateInterface
{
	/**
     * @var contains fixer.io api key string
     */
	protected $api_key;
	
	/**
     * @const contains fixer.io API URL
     */
	const API_URL = "http://data.fixer.io/api/latest";
	
	/**
     * get api key
     *
     * @param  string $key
     * @return bool
     */
	public function __construct($key)
	{
		$this->api_key = $key;
		
		return true;
	}
	
	/**
     * change or not float decimals
     *
     * @param  float $calc
	 * @param  int   $short
     * @return float
     */
	public static function roundValue($calc, $short)
	{
		if($short){ $number = 2; }else{ $number = 5; }
		$output = round($calc, $number);
		
		return $output;
	}
	
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
	public function getValues($getFrom, $getTo, $amount, $short, $isCache, $cacheTime)
	{
		if($isCache && CacheFile::isCacheDir()){
			if(CacheFile::isFile()){
				$file = CacheFile::getFileName();
				if(CacheFile::isCurrent($file)){
					$data = CacheFile::getCache($file);
				}else{
					$data = file_get_contents(self::API_URL."?access_key=".$this->api_key);
					CacheFile::setNewCacheFile($file, $data, $cacheTime);
				}
			}else{
				$data = file_get_contents(self::API_URL."?access_key=".$this->api_key);
				CacheFile::setNewCacheFile(false, $data, $cacheTime);
			}
		}else{
			$data = file_get_contents(self::API_URL."?access_key=".$this->api_key);
		}
		$data = json_decode($data);
		
		if($this->validateErrors($data)){
			if(is_array($getFrom) || is_array($getTo)){
				$newArray = array();
				
				if(is_array($getFrom)){
					if(is_array($getTo)){
						foreach($getFrom as $currency){
							$getA = $data->rates->$currency;
							foreach($getTo as $currency2){
								$getB = $data->rates->$currency2;
								$calc = Calculate::roundValue(($amount * $getB)/$getA, $short);
								array_push($newArray, array($currency, array($currency2 => $calc)));
							}
						}
					}else{
						foreach($getFrom as $currency){
							$getA = $data->rates->$currency;
							$getB = $data->rates->$getTo;
							$calc = Calculate::roundValue(($amount * $getB)/$getA, $short);
							array_push($newArray, array($currency, array($getTo => $calc)));
						}
					}
				}else{
					foreach($getTo as $currency){
						$getA = $data->rates->$getFrom;
						$getB = $data->rates->$currency;
						$calc = Calculate::roundValue(($amount * $getB)/$getA, $short);
						array_push($newArray, array($getFrom, array($currency => $calc)));
					}
				}
				$output = $newArray;
			}else{
				$getA = $data->rates->$getFrom;
				$getB = $data->rates->$getTo;
				
				$output = Calculate::roundValue(($amount * $getB)/$getA, $short);
			}
		}
		return $output;
	}
	
	/**
	 * validate errors in conncection with fixer.io api
     *
	 * @param  string|array	 $data
     * @return bool
	 * @throws Exception\InvalidArgumentException
     */
	public function validateErrors($data)
	{
		if(!$data->success){
			$getErrorCode = $data->error->code;
			$getErrorInfo = $data->error->info;
			throw new \InvalidArgumentException("[$getErrorCode] $getErrorInfo");
		}
		return true;
	}
}