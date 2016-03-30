<?php


class BurgerBuilderTest extends PHPUnit_Framework_TestCase
{
    private $repository;
    private $recipe;
    private $burgerBuilder;

    public function setUp()
    {
        $this->repository = $this->getMockBuilder('IngredientRepository')->disableOriginalConstructor()->getMock();
        $this->recipe = $this->getMockBuilder(RecipeInterface::class)->getMock();

        $this->burgerBuilder = new BurgerBuilder($this->repository);
    }

    /**
     * @expectedException Exception
     */
    public function testEmptyIngredientsListThrowsException()
    {
        $ingredientNameCollection = $this->getMockBuilder(IngredientNameCollection::class)->disableOriginalConstructor()->getMock();
        $ingredientNameCollection->expects($this->once())->method('hasIngredients')->willReturn(false);

        $this->recipe->expects($this->once())
            ->method('getIngredientNameCollection')
            ->willReturn($ingredientNameCollection);

        $this->burgerBuilder->build($this->recipe);
    }

    public function testValidIngredientsListCreatesBurger()
    {
        $this->recipe->expects($this->once())
            ->method('getIngredientNameCollection')
            ->willReturn(new IngredientNameCollection('BreadBottomSide', 'BreadTopSide'));

        $this->repository->expects($this->once())->method('getIngredient')->with('BreadBottomSide')->willReturn(new BreadBottomSide(new Price(20, new ChfCurrency())));
        $this->repository->expects($this->once())->method('getIngredient')->with('BreadTopSide')->willReturn(new BreadTopSide(new Price(25, new ChfCurrency())));

        $burger = $this->burgerBuilder->build($this->recipe);
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
        $this->assertEquals('Zutaten: BreadBottomSide + BreadTopSide, Preis: 45', (string) $burger);
    }

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
        $this->recipe->expects($this->once())->method('getName')->willReturn('Testrezept');

        $this->repository->expects($this->once())->method('getIngredient')->with('BreadBottomSide')->willReturn(new BreadBottomSide(new Price(20, new ChfCurrency())));
        $this->repository->expects($this->once())->method('getIngredient')->with('BreadTopSide')->will($this->throwException(new Exception('Testmessage')));

        $this->assertNull($this->burgerBuilder->build($this->recipe));

        $this->expectOutputString('Burger "Testrezept" konnte nicht erstellt werden: Testmessage' . PHP_EOL);
    }
}