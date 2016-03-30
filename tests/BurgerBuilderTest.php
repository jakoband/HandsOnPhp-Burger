<?php


class BurgerBuilderTest extends PHPUnit_Framework_TestCase
{
    private $factory;
    private $recipe;
    private $burgerBuilder;

    public function setUp()
    {
        $this->factory = new IngredientFactory();
        $this->recipe = $this->getMockBuilder(RecipeInterface::class)->getMock();

        $this->burgerBuilder = new BurgerBuilder($this->factory);
    }

    /**
     * @expectedException Exception
     */
    public function testEmptyIngredientsListThrowsException()
    {
        $this->recipe->expects($this->once())
            ->method('getIngredientList')
            ->willReturn([]);

        $this->burgerBuilder->create($this->recipe);
    }

    public function testValidIngredientsListCreatesBurger()
    {
        $this->recipe->expects($this->once())
            ->method('getIngredientList')
            ->willReturn([
                BreadBottomSide::class,
                BreadTopSide::class
            ]);

        $burger = $this->burgerBuilder->create($this->recipe);
        $this->assertInstanceOf(Burger::class, $burger);

        return $burger;
    }

    /**
     * @param $burger
     *
     * @depends testValidIngredientsListCreatesBurger
     */
    public function testStringRepresentationOfBurger($burger)
    {
        $this->assertEquals('BreadBottomSide + BreadTopSide', $burger);
    }
}
