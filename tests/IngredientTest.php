<?php

/**
 * @covers Ingredient
 */
class IngredientTest extends PHPUnit_Framework_TestCase
{
    /**
     * @param string $className
     *
     * @dataProvider provideIngredientClassNames
     */
    public function testStringRepresentationOfIngredients($className)
    {
        $price = $this->getMockBuilder(Price::class)->disableOriginalConstructor()->getMock();
        $this->assertEquals($className, (string) new $className($price));
    }

    /**
     * @param String $className
     *
     * @dataProvider provideIngredientClassNames
     */
    public function testPriceOfIngredients($className)
    {
        $price = $this->getMockBuilder(Price::class)->disableOriginalConstructor()->getMock();

        /** @var Ingredient $ingredient */
        $ingredient = new $className($price);
        $this->assertEquals($price, $ingredient->getPrice());
    }

    /**
     * @return array
     */
    public function provideIngredientClassNames()
    {
        return [
            [BreadBottomSide::class],
            [Patty::class],
            [Tomato::class],
            [Sauce::class],
            [Salad::class],
            [Cheese::class],
            [BreadTopSide::class],
        ];
    }
}
