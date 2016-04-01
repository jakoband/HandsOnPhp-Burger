<?php

/**
 * @covers Burger
 * @uses Ingredient
 * @uses IngredientCollection
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
        $ingredientCollection = new IngredientCollection(
            new Salad(new Price(10, $chfCurrency)),
            new Patty(new Price(20, $chfCurrency)),
            new BreadTopSide(new Price(10, $chfCurrency))
        );

        $burger = new Burger($ingredientCollection);

        $this->assertEquals(40, $burger->getPrice()->getAmountInLowestUnit());

        return $burger;
    }

    /**
     * @param Burger $burger
     *
     * @depends testBurgerPrice
     */
    public function testBurgerStringRepresentation(Burger $burger)
    {
        $this->assertEquals('Zutaten: Salad + Patty + BreadTopSide, Preis: 40', (string) $burger);
    }
}
