<?php

class IngredientFactoryTest extends PHPUnit_Framework_TestCase
{
    private $factory;

    public function setUp()
    {
        $this->factory = new IngredientFactory();
    }

    /**
     * @param $className
     *
     * @dataProvider provideIngredientClassNames
     */
    public function testCreateIngredientsWorksForKnownIngredients($className)
    {
        $createdIngredient = $this->factory->create($className);
        $this->assertInstanceOf($className, $createdIngredient);
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

    /**
     * @expectedException InvalidArgumentException
     */
    public function testCreateNotExistingClassThrowsError()
    {
        $this->factory->create('Snail');
    }
}