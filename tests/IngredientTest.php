<?php


class IngredientTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provideIngredientClassNames
     */
    public function testStringRepresentationOfIngredients($className)
    {
        $this->assertEquals($className, (string) new $className);
    }

    public function provideIngredientClassNames()
    {
        return [
            [BreadBottomSide::class],
            [Patty::class],
            [Tomatoe::class],
            [Sauce::class],
            [Salad::class],
            [Cheese::class],
            [BreadTopSide::class],
        ];
    }
}
