<?php


class IngredientNameCollectionTest extends PHPUnit_Framework_TestCase
{

    public function testGetIngredientNames()
    {
        $ingredientNameCollection = new IngredientNameCollection(
            'Salad',
            'Patty'
        );

        $this->assertCount(2, $ingredientNameCollection->getIngredientNames());

        return $ingredientNameCollection;
    }

    /**
     * @param IngredientNameCollection $ingredientNameCollection
     *
     * @depends testGetIngredientNames
     */
    public function testHasIngredient(IngredientNameCollection $ingredientNameCollection)
    {
        $this->assertTrue($ingredientNameCollection->hasIngredients());
    }

    public function testEmptyIngredientNameCollectionThrowsException()
    {
        $this->expectException(EmptyCollectionException::class);
        new IngredientNameCollection();
    }
}
