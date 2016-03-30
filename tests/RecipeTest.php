<?php

/**
 * @covers Recipe
 * @uses HamburgerRecipe
 * @uses CheeseburgerRecipe
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
                'HamburgerRecipe',
                [
                    BreadBottomSide::class,
                    Patty::class,
                    Tomato::class,
                    Sauce::class,
                    Salad::class,
                    BreadTopSide::class,
                ],
                'Hamburger'
            ],

            [
                'CheeseburgerRecipe',
                [
                    BreadBottomSide::class,
                    Patty::class,
                    Tomato::class,
                    Sauce::class,
                    Salad::class,
                    Cheese::class,
                    BreadTopSide::class,
                ],
                'Cheeseburger'
            ],
        ];
    }
}
