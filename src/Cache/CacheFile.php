<?php

namespace CConverter\Cache;

class CacheFile
{
	/**
	 * check if is cache dir
     *
     * @return bool
     */
	public static function isCacheDir()
	{
		if(!is_dir(__DIR__ .'/cache/')) mkdir(__DIR__ ."/cache/", 0700);
		
		return true;
	}
	
	/**
	 * check if cache file exists
     *
     * @return bool
     */
	public static function isFile()
	{
		$files = glob(__DIR__ .'/cache/*.txt');
		$count = count($files);
		if($count>0){
			$output = true;
		}else{
			$output = false;
		}
		
		return $output;
	}
	
	/**
	 *  get name of cache file
     *
     * @return string
     */
	public static function getFileName()
	{
		$files = glob(__DIR__ .'/cache/*.txt');
		$file = $files[0];
		$fileName = explode("/cache/", $file);
		$fileName = $fileName[1];
		
		return $fileName;
	}
	
	/**
	 *  check if cache file is needed to update
     *
     * @return bool
     */
	public static function isCurrent($file)
	{
		$getSourceName = explode(".", $file);
		$getSourceName = $getSourceName[0];
		
		$current_time = time();
		if($current_time>$getSourceName){
			$output = false;
		}else{
			$output = true;
		}
		
		return $output;
	}
	
	/**
	 *  create new cache file
     *
	 * @param  string        $file
	 * @param  array         $data
	 * @param  int           $time
     * @return bool
     */
	public static function setNewCacheFile($file, $data, $time)
	{
		if($file) unlink(__DIR__ .'/cache/'.$file);
		
		$current_time = time();
		$new_time = $current_time + $time*60;
		
		$file_name = $new_time.".txt";
		file_put_contents(__DIR__ .'/cache/'.$file_name, $data);
		
		return true;
	}
	
	/**
	 *  get cache data
     *
     * @return array
     */
	public static function getCache($file)
	{
		$data = file_get_contents(__DIR__ .'/cache/'.$file);
		
		return $data;
	}
}