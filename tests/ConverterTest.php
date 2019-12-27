<?php

namespace CConverterTest;

use CConverter\Converter;
use CConverter\ConverterCurrency;
use PHPUnit\Framework\TestCase;

class ConverterTest extends TestCase
{
    public function testValidateInput()
    {
        $value = new Converter('YOUR_TEST_API_KEY');
        
        $this->assertEquals('PLN', $value->validateInput('PLN'));
        $this->assertEquals('PLN', $value->validateInput('PL'));
    }
    
    public function testConvertFunction()
    {
        $value = new Converter('YOUR_TEST_API_KEY');
        
        $this->assertLessThan($value->cconv('EUR', 'PLN'), $value->cconv('PLN', 'EUR'));
        $this->assertIsString($value->validateInput('PLN'));
        $this->assertIsBool($value->validateInput(0123));
        $this->assertFalse($value->validateInput(0123));
    }
}