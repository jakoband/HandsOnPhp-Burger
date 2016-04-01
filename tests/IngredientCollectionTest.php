<?php


/**
 * @covers IngredientCollection
 * @uses Ingredient
 */
class IngredientCollectionTest extends PHPUnit_Framework_TestCase
{

    public function testGetIngredients()
    {
        $salad = $this->getMockBuilder(IngredientInterface::class)->disableOriginalConstructor()->getMock();
        $salad->expects($this->once())->method('__toString')->willReturn('Salad');
        $patty = $this->getMockBuilder(IngredientInterface::class)->disableOriginalConstructor()->getMock();
        $patty->expects($this->once())->method('__toString')->willReturn('Patty');

        $ingredientCollection = new IngredientCollection($salad, $patty);

        $ingredients = $ingredientCollection->getIngredients();
        $this->assertCount(2, $ingredients);

        $saladIngredient = $ingredients[0];
        $this->assertInstanceOf(IngredientInterface::class, $saladIngredient);
        $this->assertEquals('Salad', (string) $saladIngredient);

        $pattyIngredient = $ingredients[1];
        $this->assertInstanceOf(IngredientInterface::class, $pattyIngredient);
        $this->assertEquals('Patty', (string) $pattyIngredient);
    }

    public function testStringRepresentationOfIngredientCollection()
    {
        $salad = $this->getMockBuilder(IngredientInterface::class)->disableOriginalConstructor()->getMock();
        $salad->expects($this->once())->method('__toString')->willReturn('Salad');
        $patty = $this->getMockBuilder(IngredientInterface::class)->disableOriginalConstructor()->getMock();
        $patty->expects($this->once())->method('__toString')->willReturn('Patty');

        $ingredientCollection = new IngredientCollection($salad, $patty);
        $this->assertEquals('Salad + Patty', (string) $ingredientCollection);
    }
}
