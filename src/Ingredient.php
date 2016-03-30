<?php

abstract class Ingredient implements IngredientInterface
{
    public function __toString()
    {
        return get_class($this);
    }
}