<?php


class PlaintextBurgerRendererTest extends PHPUnit_Framework_TestCase
{
    public function testRenderBurgerWorksAsExpected()
    {
        $burgerViewModel = $this->getMockBuilder(BurgerViewModel::class)->disableOriginalConstructor()->getMock();
        $burgerViewModel->expects($this->once())->method('getName')->willReturn('Name');
        $burgerViewModel->expects($this->once())->method('getFormattedPrice')->willReturn('FormattedPrice');
        $burgerViewModel->expects($this->once())->method('getIngredients')->willReturn('Ingredients');

        $renderer = new PlaintextBurgerRenderer();
        $output = $renderer->render($burgerViewModel);

        $this->assertEquals('"Name": Zutaten: Ingredients, Preis: FormattedPrice' . PHP_EOL, $output);
    }
}
