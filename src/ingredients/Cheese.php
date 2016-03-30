<?php

class Cheese extends Ingredient implements IngredientInterface
{
    public function getPriceInCents()
    {
        return 50;
    }
}    
