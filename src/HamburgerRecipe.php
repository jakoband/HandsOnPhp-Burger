<?php

class HamburgerRecipe extends Recipe
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
}