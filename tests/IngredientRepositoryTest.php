<?php

/**
 * @covers IngredientRepository
 * @uses Ingredient
 */
class IngredientRepositoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var IngredientRepository
     */
    private $repository;

    public function setUp()
    {
        $this->repository = new IngredientRepository();
    }

    /**
     * @param $ingredientName
     * @param Ingredient $ingredient
     * @return IngredientInterface
     *
     * @dataProvider provideIngredientNames
     */
    public function testAddIngredientsWorksForKnownIngredients($ingredientName, Ingredient $ingredient)
    {
        $this->repository->addIngredient($ingredient);
        $retrievedIngredient = $this->repository->getIngredient($ingredientName);
        $this->assertInstanceOf($ingredientName, $retrievedIngredient);

        return $retrievedIngredient;
    }

    public function provideIngredientNames()
    {
        return [
            ['BreadBottomSide', new BreadBottomSide(new Price(10, new ChfCurrency()))],
            ['Patty', new Patty(new Price(10, new ChfCurrency()))],
            ['Tomato', new Tomato(new Price(10, new ChfCurrency()))],
            ['Sauce', new Sauce(new Price(10, new ChfCurrency()))],
            ['Salad', new Salad(new Price(10, new ChfCurrency()))],
            ['Cheese', new Cheese(new Price(10, new ChfCurrency()))],
            ['BreadTopSide', new BreadTopSide(new Price(10, new ChfCurrency()))],
        ];
    }

    public function testNotExistingIngredientThrowsException()
    {
        $this->expectException(UnavailableIngredientException::class);
        $this->repository->getIngredient('Patty');
    }

    public function testAddingInvalidIngredientThrowsException()
    {
        $ingredient = $this->getMockBuilder(IngredientInterface::class)->disableOriginalConstructor()->getMock();
        $ingredient->expects($this->once())->method('__toString')->willReturn('Chair');

        $this->expectException(InvalidIngredientException::class);
        $this->repository->addIngredient($ingredient);
    }
}
