<?php

class FakeBurgerRecipeWithoutIngredients extends Recipe
{
    protected $ingredientNames = [];

    /**
     * @return string
     */
    public function getName()
    {
        return 'FakeBurger';
    }
}
