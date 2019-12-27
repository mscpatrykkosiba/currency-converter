<?php

namespace CConverterTest\Calculate;

use CConverter\Calculate\Calculate;
use CConverter\Cache\CacheFile;
use PHPUnit\Framework\TestCase;

class CalculateTest extends TestCase
{
    public function testRoundValue()
    {
        $value = new Calculate('YOUR_TEST_API_KEY');
        
        $this->assertIsFloat($value::roundValue(20.3040, 2));
    } 
    /*
    public function testValidateErrorsException()
    {
        $value = new Calculate('YOUR_TEST_API_KEY');
        
        $this->expectException($value->validateErrors("test"));
        $this->assertIsBool($value->validateErrors("test"));
    }
     */
}