<?php

interface RecipeInterface
{
    /**
     * @return IngredientNameCollection
     */
    public function getIngredientList();
}
