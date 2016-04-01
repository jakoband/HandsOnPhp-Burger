<?php

/**
 * @covers BurgerBuilder
 * @uses Burger
 * @uses Ingredient
 * @uses IngredientNameCollection
 * @uses Price
 * @uses ChfCurrency
 */
class BurgerBuilderTest extends PHPUnit_Framework_TestCase
{
    private $repository;
    private $recipe;
    private $burgerBuilder;

    public function setUp()
    {
        $this->repository = $this->getMockBuilder('IngredientRepository')
            ->disableOriginalConstructor()
            ->getMock();

        $this->recipe = $this->getMockBuilder(RecipeInterface::class)->getMock();

        $this->burgerBuilder = new BurgerBuilder($this->repository);
    }

    public function testEmptyIngredientsListThrowsException()
    {
        $ingredientNameCollection = $this->getMockBuilder(IngredientNameCollection::class)
            ->disableOriginalConstructor()
            ->getMock();

        $ingredientNameCollection->expects($this->once())
            ->method('hasIngredients')
            ->willReturn(false);

        $this->recipe->expects($this->once())
            ->method('getIngredientNameCollection')
            ->willReturn($ingredientNameCollection);

        $this->expectException(BurgerBuilderException::class);
        $this->burgerBuilder->build($this->recipe);
    }

    public function testValidIngredientsListCreatesBurger()
    {
        $this->recipe->expects($this->once())
            ->method('getIngredientNameCollection')
            ->willReturn(new IngredientNameCollection('BreadBottomSide', 'BreadTopSide'));
        $this->recipe->expects($this->once())
            ->method('getName')
            ->willReturn('Testburger');

        $this->repository->expects($this->at(0))
            ->method('getIngredient')
            ->willReturn(new BreadBottomSide(new Price(20, new ChfCurrency())));

        $this->repository->expects($this->at(1))
            ->method('getIngredient')
            ->willReturn(new BreadTopSide(new Price(25, new ChfCurrency())));

        $burger = $this->burgerBuilder->build($this->recipe);
        $this->assertInstanceOf(Burger::class, $burger);

        return $burger;
    }

    /**
     * @expectedException Exception
     */
    public function testBurgerBuildingWithInsufficientIngredientsThrowsException()
    {
        $ingredientNameCollection = $this->getMockBuilder(IngredientNameCollection::class)->disableOriginalConstructor()->getMock();

        $ingredientNameCollection
            ->expects($this->once())
            ->method('hasIngredients')
            ->willReturn(true);

        $ingredientNameCollection
            ->expects($this->once())
            ->method('getIngredientNames')
            ->willReturn(['BreadBottomSide', 'BreadTopSide']);

        $this->recipe->expects($this->once())
            ->method('getIngredientNameCollection')
            ->willReturn($ingredientNameCollection);

        $this->repository->expects($this->at(0))
            ->method('getIngredient')
            ->willReturn(new BreadBottomSide(new Price(20, new ChfCurrency())));
        $this->repository->expects($this->at(1))
            ->method('getIngredient')
            ->will($this->throwException(new Exception('Testmessage')));

        $this->burgerBuilder->build($this->recipe);
    }
}
