<?php

/**
 * @covers BurgerViewModel
 */
class BurgerViewModelTest extends PHPUnit_Framework_TestCase
{
    public function testGetters()
    {
        $burgerViewModel = new BurgerViewModel('name', 'price', 'ingredients');

        $this->assertEquals('name', $burgerViewModel->getName());
        $this->assertEquals('price', $burgerViewModel->getFormattedPrice());
        $this->assertEquals('ingredients', $burgerViewModel->getIngredients());
    }
}
