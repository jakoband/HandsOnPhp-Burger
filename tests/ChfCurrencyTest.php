<?php


class ChfCurrencyTest extends PHPUnit_Framework_TestCase
{

    public function testCurrencyIsoCode()
    {
        $chfCurrency = new ChfCurrency();

        $this->assertEquals('CHF', $chfCurrency->getCode());
    }
}
