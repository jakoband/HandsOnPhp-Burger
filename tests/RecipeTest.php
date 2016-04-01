<?php

/**
 * @covers Recipe
 * @covers HamburgerRecipe
 * @covers CheeseburgerRecipe
 * @uses IngredientNameCollection
 */
class RecipeTest extends PHPUnit_Framework_TestCase
{
    /**
     * @param string $recipeClassName
     * @param array $expectedIngredients
     * @param string $recipeName
     *
     * @dataProvider providesRecipeClassNamesAndIngredientLists
     */
    public function testRecipesAreCorrect(string $recipeClassName, array $expectedIngredients, string $recipeName)
    {
        /** @var RecipeInterface $recipe */
        $recipe = new $recipeClassName;
        $testedRecipeIngredientNames = $recipe->getIngredientNameCollection()->getIngredientNames();

        $this->assertEquals($expectedIngredients, $testedRecipeIngredientNames);
        $this->assertEquals($recipeName, $recipe->getName());
    }

    public function providesRecipeClassNamesAndIngredientLists()
    {
        return [
            [
                HamburgerRecipe::class,
                [
                    'BreadBottomSide',
                    'Patty',
                    'Tomato',
                    'Sauce',
                    'Salad',
                    'BreadTopSide',
                ],
                'Hamburger'
            ],

            [
                CheeseburgerRecipe::class,
                [
                    'BreadBottomSide',
                    'Patty',
                    'Tomato',
                    'Sauce',
                    'Salad',
                    'Cheese',
                    'BreadTopSide',
                ],
                'Cheeseburger'
            ],
        ];
    }

    public function testCreationOfRecipeWithInvalidIngredientNamesThrowsException()
    {
        $this->expectException(RecipeException::class);
        $this->expectExceptionMessage('Recipe "FakeBurger" contains of ingredient names that are not strings.');
        new FakeBurgerRecipeWithInvalidIngredients();
    }

    public function testCreationOfRecipeWithNoIngredientsThrowsException()
    {
        $this->expectException(RecipeException::class);
        $this->expectExceptionMessage('Recipe "FakeBurger" is not valid without ingredient names.');
        new FakeBurgerRecipeWithoutIngredients();
    }

}
