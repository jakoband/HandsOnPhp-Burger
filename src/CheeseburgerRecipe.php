<?php

class CheeseburgerRecipe extends Recipe
{
    protected $ingredientNames = [
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
}
