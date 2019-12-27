<?php

namespace CConverterTest;

use CConverter\ConverterCurrency;
use PHPUnit\Framework\TestCase;

class ConvertCurrencyTest extends TestCase
{
    public function testGetCurrency()
    {
        $value = new ConverterCurrency();
        
        $this->assertEquals('PLN', $value->getCurrency('PLN'));
        $this->assertEquals('PLN', $value->getCurrency('PL'));
    }

}