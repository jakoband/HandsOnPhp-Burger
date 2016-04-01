<?php


class SwissNumberFormatTest extends PHPUnit_Framework_TestCase
{

    public function testFormatImplementsInterface()
    {
        $format = new SwissNumberFormat();
        $this->assertInstanceOf(NumberFormatInterface::class, $format);
    }

    public function testGetDecimalsReturnsTwo()
    {
        $format = new SwissNumberFormat();
        $this->assertEquals(2, $format->getDecimals());
    }

    public function testGetDecimalPointReturnsPoint()
    {
        $format = new SwissNumberFormat();
        $this->assertEquals('.', $format->getDecimalPoint());
    }

    public function testGetThousandsSeparatorReturnsApostrophy()
    {
        $format = new SwissNumberFormat();
        $this->assertEquals('\'', $format->getThousandsSeparator());
    }
}
