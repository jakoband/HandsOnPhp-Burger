<?php

class IngredientRepositoryTest extends PHPUnit_Framework_TestCase
{
    private $repository;

    public function setUp()
    {
        $this->repository = new IngredientRepository();
    }

    /**
     * @param $ingredientName
     * @param $addMethod
     * @param Ingredient $ingredient
     * @param $getMethod
     * @return IngredientInterface
     *
     * @dataProvider provideIngredientNames
     */
    public function testAddIngredientsWorksForKnownIngredients($ingredientName, $addMethod, Ingredient $ingredient, $getMethod)
    {
        $this->repository->$addMethod($ingredient);
        $retrievedIngredient = $this->repository->$getMethod($ingredientName);
        $this->assertInstanceOf($ingredientName, $retrievedIngredient);

        return $retrievedIngredient;
    }

    public function provideIngredientNames()
    {
        return [
            ['BreadBottomSide', 'addBreadBottomSide', new BreadBottomSide(10), 'getBreadBottomSide'],
            ['Patty', 'addPatty', new Patty(10), 'getPatty'],
            ['Tomato', 'addTomato', new Tomato(10), 'getTomato'],
            ['Sauce', 'addSauce', new Sauce(10), 'getSauce'],
            ['Salad', 'addSalad', new Salad(10), 'getSalad'],
            ['Cheese', 'addCheese', new Cheese(10), 'getCheese'],
            ['BreadTopSide', 'addBreadTopSide', new BreadTopSide(10), 'getBreadTopSide'],
        ];
    }

    /**
     * @expectedException Exception
     */
    public function testNotExistingIngredientThrowsException()
    {
        $this->repository->getPatty();
    }
}