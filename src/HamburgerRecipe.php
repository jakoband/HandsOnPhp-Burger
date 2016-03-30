<?php

class HamburgerRecipe implements RecipeInterface
{
    /**
     * @var IngredientNameCollection
     */
    private $ingredientNameList;

    public function __construct()
    {
        $this->ingredientNameList = new IngredientNameCollection(
            'BreadBottomSide',
            'Patty',
            'Tomatoe',
            'Sauce',
            'Salad',
            'BreadTopSide'
        );
    }

    /**
     * @return IngredientNameCollection
     */
    public function getIngredientList()
    {
        return $this->ingredientNameList;
    }
}