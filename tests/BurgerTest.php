<?php

/**
 * @covers Burger
 * @uses Ingredient
 * @uses ChfCurrency
 * @uses Salad
 * @uses Patty
 * @uses BreadTopSide
 * @uses Price
 */
class BurgerTest extends PHPUnit_Framework_TestCase
{

    public function testBurgerPrice()
    {
        $chfCurrency = new ChfCurrency();

        $burger = new Burger(
            'TestBurger',
            new Salad(new Price(10, $chfCurrency)),
            new Patty(new Price(20, $chfCurrency)),
            new BreadTopSide(new Price(10, $chfCurrency))
        );

        $this->assertEquals(40, $burger->getPrice($chfCurrency)->getAmountInLowestUnit());

        return $burger;
    }

    /**
     * @param Burger $burger
     *
     * @depends testBurgerPrice
     */
    public function testGetBurgerIngredients(Burger $burger)
    {
        $ingredients = $burger->getIngredients();

        $this->assertCount(3, $ingredients);

        $salad = $ingredients[0];
        $this->assertInstanceOf(Salad::class, $salad);

        $patty = $ingredients[1];
        $this->assertInstanceOf(Patty::class, $patty);

        $breadTopSide = $ingredients[2];
        $this->assertInstanceOf(BreadTopSide::class, $breadTopSide);
    }

    public function testEmptyIngredientsBurgerThrowsException()
    {
        $this->expectException(MissingIngredientException::class);
        new Burger('TestBurger');
    }
}
