<?php

interface RecipeInterface
{
    /**
     * @return IngredientNameCollection
     */
    public function getIngredientNameCollection();

    /**
     * @return string
     */
    public function getName();
}