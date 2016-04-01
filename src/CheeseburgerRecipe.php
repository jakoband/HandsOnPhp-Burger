<?php

class CheeseburgerRecipe implements RecipeInterface
{
    private $ingredientNames = [
        'BreadBottomSide',
        'Patty',
        'Tomato',
        'Sauce',
        'Salad',
        'Cheese',
        'BreadTopSide'
    ];

    /**
     * @return string
     */
    public function getName()
    {
        return 'Cheeseburger';
    }

    /**
     * @return IngredientNameCollection
     */
    public function getIngredientNameCollection()
    {
        return new IngredientNameCollection(...$this->ingredientNames);
    }
}
