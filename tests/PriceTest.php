<?php

/**
 * @covers Price
 */
class PriceTest extends PHPUnit_Framework_TestCase
{

    public function testGetAmountInLowestUnit()
    {
        $currency = $this->getMockBuilder(CurrencyInterface::class)->disableOriginalConstructor()->getMock();
        $price = new Price(200, $currency);

        $this->assertEquals(200, $price->getAmountInLowestUnit());
    }

    public function testGetCurrency()
    {
        $currency = $this->getMockBuilder(CurrencyInterface::class)->disableOriginalConstructor()->getMock();
        $price = new Price(200, $currency);

        $this->assertEquals($currency, $price->getCurrency());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testNegativeAmountThrowsException()
    {
        $currency = $this->getMockBuilder(CurrencyInterface::class)->disableOriginalConstructor()->getMock();
        new Price(-200, $currency);
    }

    public function testAddWorksLikeExpected()
    {
        $currency = $this->getMockBuilder(CurrencyInterface::class)->disableOriginalConstructor()->getMock();

        $price1 = new Price(200, $currency);
        $price2 = new Price(100, $currency);

        $newPrice = $price1->add($price2);

        $this->assertInstanceOf(Price::class, $newPrice);
        $this->assertEquals(300, $newPrice->getAmountInLowestUnit());
        $this->assertEquals($currency, $newPrice->getCurrency());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testAddFailsWithDifferentCurrencies()
    {
        $currency1 = $this->getMockBuilder(CurrencyInterface::class)->disableOriginalConstructor()->getMock();
        $currency1->expects($this->exactly(2))->method('getCode')->willReturn('CHF');

        $currency2 = $this->getMockBuilder(CurrencyInterface::class)->disableOriginalConstructor()->getMock();
        $currency2->expects($this->exactly(2))->method('getCode')->willReturn('EUR');

        $price1 = new Price(200, $currency1);
        $price2 = new Price(100, $currency2);

        $price1->add($price2);
    }

    public function testAddReturnsNewInstanceOfPrice()
    {
        $currency = $this->getMockBuilder(CurrencyInterface::class)->disableOriginalConstructor()->getMock();

        $price1 = new Price(200, $currency);
        $price2 = new Price(100, $currency);

        $newPrice = $price1->add($price2);

        $this->assertNotEquals($price1, $newPrice);
    }
}
