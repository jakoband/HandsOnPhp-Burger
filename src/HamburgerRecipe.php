<?php

class HamburgerRecipe implements RecipeInterface
{
    protected $ingredientNames = [
        'BreadBottomSide',
        'Patty',
        'Tomato',
        'Sauce',
        'Salad',
        'BreadTopSide'
    ];

    /**
     * @return string
     */
    public function getName()
    {
        return 'Hamburger';
    }

    /**
     * @return IngredientNameCollection
     */
    public function getIngredientNameCollection()
    {
        return new IngredientNameCollection(...$this->ingredientNames);
    }
}
