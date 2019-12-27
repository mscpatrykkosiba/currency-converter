<?php

namespace CConverterTest\Cache;

use CConverter\Cache\Cache;
use PHPUnit\Framework\TestCase;

class CacheTest extends TestCase
{
    public function testSetCache()
    {
        $value = new Cache();
        
        $this->assertIsBool($value->setCache(true, 10));
        $this->assertTrue($value->setCache(true, 10));
        $this->assertFalse($value->setCache(false, 10));
        $this->assertFalse($value->setCache(false, '10'));
    }
}