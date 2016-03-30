<?php


class RecipeTest extends PHPUnit_Framework_TestCase
{
    /**
     * @param $recipeClassName
     * @param $expectedIngredients
     *
     * @dataProvider providesRecipeClassNamesAndIngredientLists
     */
    public function testRecipesAreCorrect($recipeClassName, $expectedIngredients)
    {
        $recipe = new $recipeClassName;
        $testedRecipeIngredients = $recipe->getIngredientList();

        foreach ($expectedIngredients as $key => $expectedIngredient) {
            $this->assertEquals($expectedIngredient, $testedRecipeIngredients[$key]);
        }
    }

    public function providesRecipeClassNamesAndIngredientLists()
    {
        return [
            [
                'HamburgerRecipe',
                [
                    BreadBottomSide::class,
                    Patty::class,
                    Tomatoe::class,
                    Sauce::class,
                    Salad::class,
                    BreadTopSide::class,
                ]
            ],

            [
                'CheeseburgerRecipe',
                [
                    BreadBottomSide::class,
                    Patty::class,
                    Tomatoe::class,
                    Sauce::class,
                    Salad::class,
                    Cheese::class,
                    BreadTopSide::class,
                ]
            ],
        ];
    }
}
