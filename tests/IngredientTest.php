<?php


class IngredientTest extends PHPUnit_Framework_TestCase
{
    /**
     * @param string $className
     * @param int $price
     *
     * @dataProvider provideIngredientClassNames
     */
    public function testStringRepresentationOfIngredients($className, $price)
    {
        $this->assertEquals($className, (string) new $className($price));
    }

    public function provideIngredientClassNames()
    {
        return [
            [BreadBottomSide::class, 10],
            [Patty::class, 10],
            [Tomato::class, 10],
            [Sauce::class, 10],
            [Salad::class, 10],
            [Cheese::class, 10],
            [BreadTopSide::class, 10],
        ];
    }
}
