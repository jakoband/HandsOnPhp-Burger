<?php


class SwissPriceFormatterTest extends PHPUnit_Framework_TestCase
{

    public function testPositiveNumberGreaterThousandFormatWorksAsExpected()
    {
        $numberFormat = $this->getMockBuilder(NumberFormatInterface::class)->disableOriginalConstructor()->getMock();
        $numberFormat->expects($this->once())->method('getDecimals')->willReturn(2);
        $numberFormat->expects($this->once())->method('getDecimalPoint')->willReturn('.');
        $numberFormat->expects($this->once())->method('getThousandsSeparator')->willReturn('\'');

        $price = $this->getMockBuilder(Price::class)->disableOriginalConstructor()->getMock();
        $price->expects($this->once())->method('getAmountInLowestUnit')->willReturn(133712);

        $formatter = new SwissPriceFormatter($numberFormat);
        $this->assertEquals('CHF 1\'337.12', $formatter->formatPrice($price));
    }

    public function testPositiveNumberSmallerThousandFormatWorksAsExpected()
    {
        $numberFormat = $this->getMockBuilder(NumberFormatInterface::class)->disableOriginalConstructor()->getMock();
        $numberFormat->expects($this->once())->method('getDecimals')->willReturn(2);
        $numberFormat->expects($this->once())->method('getDecimalPoint')->willReturn('.');
        $numberFormat->expects($this->once())->method('getThousandsSeparator')->willReturn('\'');

        $price = $this->getMockBuilder(Price::class)->disableOriginalConstructor()->getMock();
        $price->expects($this->once())->method('getAmountInLowestUnit')->willReturn(1337);

        $formatter = new SwissPriceFormatter($numberFormat);
        $this->assertEquals('CHF 13.37', $formatter->formatPrice($price));
    }

    public function testNegativeNumberSmallerThousandFormatWorksAsExpected()
    {
        $numberFormat = $this->getMockBuilder(NumberFormatInterface::class)->disableOriginalConstructor()->getMock();
        $numberFormat->expects($this->once())->method('getDecimals')->willReturn(2);
        $numberFormat->expects($this->once())->method('getDecimalPoint')->willReturn('.');
        $numberFormat->expects($this->once())->method('getThousandsSeparator')->willReturn('\'');

        $price = $this->getMockBuilder(Price::class)->disableOriginalConstructor()->getMock();
        $price->expects($this->once())->method('getAmountInLowestUnit')->willReturn(-1337);

        $formatter = new SwissPriceFormatter($numberFormat);
        $this->assertEquals('CHF -13.37', $formatter->formatPrice($price));
    }

    public function testZeroFormatWorksAsExpected()
    {
        $numberFormat = $this->getMockBuilder(NumberFormatInterface::class)->disableOriginalConstructor()->getMock();
        $numberFormat->expects($this->once())->method('getDecimals')->willReturn(2);
        $numberFormat->expects($this->once())->method('getDecimalPoint')->willReturn('.');
        $numberFormat->expects($this->once())->method('getThousandsSeparator')->willReturn('\'');

        $price = $this->getMockBuilder(Price::class)->disableOriginalConstructor()->getMock();
        $price->expects($this->once())->method('getAmountInLowestUnit')->willReturn(0);

        $formatter = new SwissPriceFormatter($numberFormat);
        $this->assertEquals('CHF 0.00', $formatter->formatPrice($price));
    }
}
