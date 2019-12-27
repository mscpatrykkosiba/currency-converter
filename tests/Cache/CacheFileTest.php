<?php

namespace CConverterTest\Cache;

use CConverter\Cache\CacheFile;
use PHPUnit\Framework\TestCase;

class CacheFileTest extends TestCase
{
    public function testIsDir()
    {
        $value = new CacheFile();
        
        $this->assertTrue($value::isCacheDir());
    }
    
    public function testIsFile()
    {
        $value = new CacheFile();
        
        $this->assertFalse($value::isFile());
        $this->assertIsBool($value::isFile());
    }
    
    /*
    public function testGetFileName()
    {
        $value = new CacheFile();
        
        $this->assertIsString($value::getFileName());
    }
    
    public function testGetCache()
    {
        $value = new CacheFile();
        
        $this->assertIsString($value::getCache('tmp.txt'));
    }
     */
}