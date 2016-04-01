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
     * @depends testBurgerPrice
     */
    public function testGetBurgerIngredients(Burger $burger)
    {
        $ingredients = $burger->getIngredients()->getIngredients();

        $this->assertCount(3, $ingredients);

        $salad = $ingredients[0];
        $this->assertInstanceOf(Salad::class, $salad);

        $patty = $ingredients[1];
        $this->assertInstanceOf(Patty::class, $patty);

        $breadTopSide = $ingredients[2];
        $this->assertInstanceOf(BreadTopSide::class, $breadTopSide);
    }
}
