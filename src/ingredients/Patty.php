<?php

class Patty extends Ingredient implements IngredientInterface
{
    public function getPriceInCents()
    {
        return 30;
    }
}    
