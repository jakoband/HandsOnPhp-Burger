<?php

class FakeBurgerRecipeWithInvalidIngredients extends Recipe
{
    protected $ingredientNames = [
        7
    ];

    /**
     * @return string
     */
    public function getName()
    {
        return 'FakeBurger';
    }
}
