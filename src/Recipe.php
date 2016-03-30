<?php

abstract class Recipe implements RecipeInterface
{
    /**
     * @var IngredientNameCollection
     */
    private $ingredientNameCollection;

    /**
     * @var array
     */
    protected $ingredientNames;

    /**
     * @return IngredientNameCollection
     */
    public function getIngredientNameCollection()
    {
        if (is_null($this->ingredientNameCollection)) {
            $this->ingredientNameCollection = new IngredientNameCollection(...$this->ingredientNames);
        }

        return $this->ingredientNameCollection;
    }
}    
