<?php


class RendererTest extends PHPUnit_Framework_TestCase
{
    public function testRenderErrorMessage()
    {
        $renderer = new Renderer();

        $renderer->renderErrorMessage('ErrorMessage');
        $this->expectOutputString('ErrorMessage' . PHP_EOL);
    }

    public function testRenderBurgerViewModel()
    {
        $burgerViewModel = $this->getMockBuilder(BurgerViewModel::class)->disableOriginalConstructor()->getMock();
        $burgerViewModel->expects($this->once())->method('getName')->willReturn('Name');
        $burgerViewModel->expects($this->once())->method('getFormattedPrice')->willReturn('FormattedPrice');
        $burgerViewModel->expects($this->once())->method('getIngredients')->willReturn('Ingredients');

        $renderer = new Renderer();
        $renderer->render($burgerViewModel);

        $this->expectOutputString('"Name": Zutaten: Ingredients, Preis: FormattedPrice' . PHP_EOL);
    }
}
